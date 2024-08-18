<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\ShowTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Repositories\TicketRepositoryInterface;
use App\Service\Ticket\TicketService;
use Illuminate\Http\Request;

class ShowTicket extends Controller
{
    protected TicketService $ticketService;
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }
    public function __invoke( Ticket $ticket ): TicketResource
    {
        return TicketResource::make(
            $this->ticketService->getTicket($ticket->id)
        );
    }

    public function showOnline(ShowTicketRequest $showTicketRequest, Ticket $ticket ): TicketResource
    {
        return TicketResource::make(
            $this->ticketService->getTicketOnline($ticket->id)
        );
    }
}
