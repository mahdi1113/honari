<?php

namespace App\Repositories;

interface PurchaseRespositoryInterface
{
    public function index();

    public function indexOnline();

    public function store( array $data );

    public function storeOnline( array $data );

}
