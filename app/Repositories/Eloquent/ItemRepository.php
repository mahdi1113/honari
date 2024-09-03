<?php

namespace App\Repositories\Eloquent;

use App\Models\Item;
use App\Repositories\ItemRepositoryInterface;
use App\Service\MediaHelper;

class ItemRepository implements ItemRepositoryInterface
{

    public function show( $itemId )
    {
        $item = Item::findOrFail( $itemId );
        $item->load( "course" );

        return $item;
    }

    public function showOnline($itemId)
    {
        $item = Item::findOrFail( $itemId );
        $item->load( "course" );

        return $item;
    }
    public function store( $data )
    {
        $item = Item::query()->create( $data );

        MediaHelper::moveVideoTo( $item );

//        $blog->load("creator");
        return $item;
    }


}
