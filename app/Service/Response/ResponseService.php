<?php

namespace App\Service\Response;

use App\Repositories\ResponseRepositoryInterface;
use Illuminate\Http\Request;

class ResponseService
{
    public function __construct(
        readonly ResponseRepositoryInterface $responseRepositoryInterface,
        readonly Request $request
    ){}

    public function createResponse()
    {
        return $this->responseRepositoryInterface->store($this->data());
    }

    public function updateResponse(int $id)
    {
        return $this->responseRepositoryInterface->update($this->data(), $id);
    }


    public function data()
    {
        $data = [
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description'),
            'ticket_id' => $this->request->get('ticket_id'),
        ];

        return $data;
    }
}
