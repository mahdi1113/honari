<?php

namespace App\Service\Item;

use App\Repositories\ItemRepositoryInterface;
use Illuminate\Http\Request;

class ItemService
{
    public function __construct(
        readonly ItemRepositoryInterface $itemRepositoryInterface,
        readonly Request $request
    ){}

    public function getItem(int $id)
    {
        return $this->itemRepositoryInterface->show($id);
    }

    public function getItemOnline(int $id)
    {
        return $this->itemRepositoryInterface->showOnline($id);
    }



    public function createItem()
    {
        return $this->itemRepositoryInterface->store( $this->data() );
    }

    public function updateItem(int $id)
    {

        return $this->itemRepositoryInterface->update( $id, $this->data() );
    }

    public function destroyItem( int $id )
    {
        return $this->itemRepositoryInterface->destroy($id);
    }


    public function data()
    {
        $data = [
            'topic' => $this->request->get('topic'),
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description'),
            'duration' => $this->request->get('duration'),
            'status' => $this->request->get('status'),
            'course_id' => $this->request->get('course_id'),
        ];

        return $data;
    }
}
