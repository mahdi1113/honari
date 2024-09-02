<?php

namespace App\Service\Purchase;

use App\Repositories\PurchaseRespositoryInterface;
use Illuminate\Http\Request;

class PurchaseService
{
    public function __construct(
        readonly PurchaseRespositoryInterface $purchaseRespositoryInterface,
        readonly Request $request
    ){}
    public function getPurchases()
    {
        return $this->purchaseRespositoryInterface->index();
    }

    public function getPurchasesOnline()
    {
        return $this->purchaseRespositoryInterface->indexOnline();
    }

    public function createPurchase()
    {
        return $this->purchaseRespositoryInterface->store($this->data());
    }

    public function createPurchaseOnline()
    {
        return $this->purchaseRespositoryInterface->storeOnline($this->data());
    }


    public function data()
    {
        $data = [
            'course_id' => $this->request->get('course_id'),
        ];

        return $data;
    }
}
