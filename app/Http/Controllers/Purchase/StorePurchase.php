<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\CreatePurchaseRequest;
use App\Http\Resources\PurchaseResource;
use App\Repositories\PurchaseRespositoryInterface;
use App\Service\Purchase\PurchaseService;
use Illuminate\Http\Request;

class StorePurchase extends Controller
{
    protected PurchaseService $purchaseService;
    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }
    public function __invoke(CreatePurchaseRequest $createPurchaseRequest )
    {
        return PurchaseResource::make(
            $this->purchaseService->createPurchase()
        );
    }

    public function storeOnline(CreatePurchaseRequest $createPurchaseRequest )
    {
        return PurchaseResource::make(
            $this->purchaseService->createPurchaseOnline()
        );
    }
}
