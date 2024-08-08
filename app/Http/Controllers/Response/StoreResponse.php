<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\Response\CreateResponseRequest;
use App\Http\Resources\ResponseResource;
use App\Repositories\ResponseRepositoryInterface;
use Illuminate\Http\Request;

class StoreResponse extends Controller
{
    public function __invoke( CreateResponseRequest $createResponseRequest )
    {
        return ResponseResource::make(
            app(ResponseRepositoryInterface::class)->store(
                $createResponseRequest->validated()
            )
        );
    }
}
