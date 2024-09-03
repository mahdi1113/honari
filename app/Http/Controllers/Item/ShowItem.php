<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Service\Item\ItemService;


class ShowItem extends Controller
{
    protected ItemService $itemService;
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    public function __invoke( Item $item )
    {
        return ItemResource::make(
            $this->itemService->getItem( $item->id )
        );
    }

    public function showOnline(Item $item)
    {
        return ItemResource::make(
            $this->itemService->getItemOnline($item->id)
        );
    }
}
