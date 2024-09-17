<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\CreateItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Service\Item\ItemService;
use App\Service\Responser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyItem extends Controller
{
    protected ItemService $itemService;
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    public function __invoke( Item $item ): JsonResponse
    {
        $this->itemService->destroyItem( $item->id );
        return response()->json( Responser::success() );
    }
}
