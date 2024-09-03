<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateItemRequest;
use App\Http\Resources\ItemResource;
use App\Service\Item\ItemService;
use Illuminate\Http\Request;

class StoreItem extends Controller
{
    protected ItemService $itemService;
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    public function __invoke( CreateItemRequest $createItemRequest )
    {
        return ItemResource::make(
            $this->itemService->createItem()
        );
    }
}
