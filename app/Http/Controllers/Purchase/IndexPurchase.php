<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;
use App\Repositories\PurchaseRespositoryInterface;
use App\Service\Purchase\PurchaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexPurchase extends Controller
{
    protected PurchaseService $purchaseService;
    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }
    public function __invoke(): AnonymousResourceCollection
    {
        return PurchaseResource::collection(
            $this->purchaseService->getPurchases()
        );
    }

    public function indexOnline(): AnonymousResourceCollection
    {
        return PurchaseResource::collection(
            $this->purchaseService->getPurchasesOnline()
        );
    }
}
