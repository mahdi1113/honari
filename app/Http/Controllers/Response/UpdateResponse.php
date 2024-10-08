<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\Response\UpdateResponseRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Response;
use App\Repositories\ResponseRepositoryInterface;
use App\Service\Response\ResponseService;
use Illuminate\Http\Request;

class UpdateResponse extends Controller
{
    protected ResponseService $responseService;
    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }
    public function __invoke( Response $response , UpdateResponseRequest $updateResponseRequest ): ResponseResource
    {
        return ResponseResource::make(
            $this->responseService->updateResponse($response->id)
        );
    }
}
