<?php

namespace App\Repositories;

interface TicketRepositoryInterface
{
    public function destroy(int $ticketId);

    public function index();

    public function indexOnline();

    public function show(int $ticketId);

    public function showOnline(int $ticketId);

    public function storeOnline(array $data);

    public function store(array $data);

    public function update(array $data, int $ticketId);

    public function updateOnline(array $data, int $ticketId);
}
