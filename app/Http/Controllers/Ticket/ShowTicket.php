<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\ShowTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Http\Request;

class ShowTicket extends Controller
{
    public function __invoke( Ticket $ticket ): TicketResource
    {
        return TicketResource::make(
            app( TicketRepositoryInterface::class )->show( $ticket->id )
        );
    }

    public function showOnline(ShowTicketRequest $showTicketRequest, Ticket $ticket ): TicketResource
    {
        return TicketResource::make(
            app( TicketRepositoryInterface::class )->showOnline( $ticket->id )
        );
    }
}
