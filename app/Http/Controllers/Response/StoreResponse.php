<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\Response\CreateResponseRequest;
use App\Http\Resources\ResponseResource;
use App\Repositories\ResponseRepositoryInterface;
use App\Service\Response\ResponseService;
use Illuminate\Http\Request;

class StoreResponse extends Controller
{
    protected ResponseService $responseService;
    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }
    public function __invoke( CreateResponseRequest $createResponseRequest )
    {
        return ResponseResource::make(
            $this->responseService->createResponse()
        );
    }
}
