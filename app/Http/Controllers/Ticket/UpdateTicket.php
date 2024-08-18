<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherCourse\UpdateTeacherRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Repositories\TicketRepositoryInterface;
use App\Service\Ticket\TicketService;
use Illuminate\Http\Request;

class UpdateTicket extends Controller
{
    protected TicketService $ticketService;
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }
    public function __invoke()
    {

    }

    public function updateOnline( Ticket $ticket , UpdateTicketRequest $updateTicketRequest ): TicketResource
    {
        return TicketResource::make(
            $this->ticketService->updateTicket($ticket->id)
        );
    }
}
