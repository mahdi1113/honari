<?php

namespace App\Service\Ticket;

use App\Models\Course;
use App\Models\Ticket;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketService
{
    use AuthorizesRequests;
    public function __construct(
        readonly TicketRepositoryInterface $ticketRepositoryInterface,
        readonly Request $request
    ){}

    public function getTickets()
    {
        return $this->ticketRepositoryInterface->index();
    }

    public function getTicketsOnline()
    {
        return $this->ticketRepositoryInterface->indexOnline();
    }

    public function getTicket($id)
    {
        return $this->ticketRepositoryInterface->show($id);
    }

    public function getTicketOnline($id)
    {
        $ticket = $this->ticketRepositoryInterface->showOnline($id);
        $this->authorize('view', $ticket);

        return $ticket;
    }

    public function createTicketOnline()
    {
        $course = $this->getAuthorizedCourse();

        return $this->ticketRepositoryInterface->storeOnline($this->data());
    }

    public function updateTicket(int $id)
    {
        $ticket = $this->getTicket($id);

        $this->authorize('update', $ticket);

        return $this->ticketRepositoryInterface->updateOnline($this->data(true), $id);
    }

    private function getAuthorizedCourse()
    {
        $courseId = $this->request->get('course_id');
        $course = Course::findOrFail($courseId);

        $this->authorize('create', [Ticket::class, $course]);

        return $course;
    }


    public function data($isUpdate = false)
    {
        $data = [
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description'),
        ];

        if (!$isUpdate) {
            $data['course_id'] = $this->request->get('course_id');
        }

        return $data;
    }
}
