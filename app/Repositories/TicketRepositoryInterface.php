<?php

namespace App\Repositories;

interface TicketRepositoryInterface
{
    public function index();

    public function indexOnline();

    public function show(int $ticketId);

    public function showOnline(int $ticketId);

    public function storeOnline(array $data);

    public function updateOnline(array $data, int $ticketId);
}
