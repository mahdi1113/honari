<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\CreateItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Service\Item\ItemService;

class UpdateItem extends Controller
{
    protected ItemService $itemService;
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    public function __invoke( Item $item, UpdateItemRequest $updateItemRequest )
    {
        return ItemResource::make(
            $this->itemService->updateItem( $item->id )
        );
    }
}
