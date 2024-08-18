<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Repositories\TicketRepositoryInterface;
use App\Service\Ticket\TicketService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexTicket extends Controller
{
    protected TicketService $ticketService;
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }
    public function __invoke(): AnonymousResourceCollection
    {
        return TicketResource::collection(
            $this->ticketService->getTickets()
        );
    }

    public function indexOnline(): AnonymousResourceCollection
    {
        return TicketResource::collection(
            $this->ticketService->getTicketsOnline()
        );
    }
}
