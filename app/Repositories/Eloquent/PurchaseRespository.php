<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Models\Purchase;
use App\Repositories\PurchaseRespositoryInterface;
use Illuminate\Support\Facades\Auth;

class PurchaseRespository implements PurchaseRespositoryInterface
{
    public function index()
    {
        return Purchase::with( ["user", "course"] )->paginate();
    }

    public function indexOnline()
    {
        $user = Auth::user()->id;

        return Purchase::where("user_id", $user)->get();
    }
    public function store(array $data)
    {
        $data['user_id'] = Auth::user()->id;

        $exists = Purchase::where('user_id', $data['user_id'])
            ->where('course_id', $data['course_id'])
            ->exists();

        if ($exists) {
            return [
                'message' => 'دوره از قبل خریداری شده است'
            ];
        }

        $purchase = Purchase::query()->create( $data );
        $purchase->load(["user", "course"]);
        return $purchase;
    }


    public function storeOnline(array $data)
    {
        $data['user_id'] = Auth::user()->id;

        $exists = Purchase::where('user_id', $data['user_id'])
            ->where('course_id', $data['course_id'])
            ->exists();

        if ($exists) {
            return [
                'message' => 'دوره از قبل خریداری شده است'
            ];
        }

        $purchase = Purchase::query()->create( $data );
        $purchase->load(["user", "course"]);
        return $purchase;
    }

}
