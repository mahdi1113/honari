<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexTicket extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return TicketResource::collection(
            app( TicketRepositoryInterface::class )->index()
        );
    }

    public function indexOnline(): AnonymousResourceCollection
    {
        return TicketResource::collection(
            app( TicketRepositoryInterface::class )->indexOnline()
        );
    }
}
