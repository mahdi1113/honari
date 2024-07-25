<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;
use App\Repositories\PurchaseRespositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexPurchase extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return PurchaseResource::collection(
            app( PurchaseRespositoryInterface::class )->index()
        );
    }
}
