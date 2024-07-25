<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseRespository
{
    public function index()
    {
        return Purchase::with( ["user", "course"] )->paginate();
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
