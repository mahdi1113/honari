<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\CreatePurchaseRequest;
use App\Http\Resources\PurchaseResource;
use App\Repositories\PurchaseRespositoryInterface;
use Illuminate\Http\Request;

class StorePurchase extends Controller
{
    public function __invoke(CreatePurchaseRequest $createPurchaseRequest )
    {
        return PurchaseResource::make(
            app(PurchaseRespositoryInterface::class)->storeOnline(
                $createPurchaseRequest->validated()
            )
        );
    }

    public function storeOnline(CreatePurchaseRequest $createPurchaseRequest )
    {
        return PurchaseResource::make(
            app(PurchaseRespositoryInterface::class)->storeOnline(
                $createPurchaseRequest->validated()
            )
        );
    }
}
