<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\Response\UpdateResponseRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Response;
use App\Repositories\ResponseRepositoryInterface;
use Illuminate\Http\Request;

class UpdateResponse extends Controller
{
    public function __invoke( Response $response , UpdateResponseRequest $updateResponseRequest ): ResponseResource
    {
        return ResponseResource::make(
            app( ResponseRepositoryInterface::class )->update(
                $updateResponseRequest->validated(),
                $response->id
            )
        );
    }
}
