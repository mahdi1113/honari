<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\CreateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Http\Request;

class StoreTicket extends Controller
{
    public function __invoke(CreateTicketRequest $createTicketRequest)
    {
        return TicketResource::make(
            app(TicketRepositoryInterface::class)->storeOnline(
                $createTicketRequest->validated()
            )
        );
    }

    public function storeOnline(CreateTicketRequest $createTicketRequest)
    {
        return TicketResource::make(
            app(TicketRepositoryInterface::class)->storeOnline(
                $createTicketRequest->validated()
            )
        );
    }
}
