<?php

namespace App\Service\Ticket;

use App\Repositories\TicketRepositoryInterface;
use Illuminate\Http\Request;

class TicketService
{
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
        return $this->ticketRepositoryInterface->showOnline($id);
    }

    public function createTicketOnline()
    {
        return $this->ticketRepositoryInterface->storeOnline($this->data());
    }

    public function updateTicket(int $id)
    {
        return $this->ticketRepositoryInterface->updateOnline($this->data(), $id);
    }


    public function data()
    {
        $data = [
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description'),
            'course_id' => $this->request->get('course_id'),
        ];

        return $data;
    }
}
