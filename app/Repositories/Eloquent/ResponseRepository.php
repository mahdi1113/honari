<?php

namespace App\Repositories\Eloquent;

use App\Models\Response;
use App\Models\Ticket;
use App\Repositories\ResponseRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ResponseRepository implements ResponseRepositoryInterface
{
    public function store($data)
    {
        $ticket = Ticket::findOrFail( $data['ticket_id'] );
        $hasResponse = $ticket->response()->exists();

        if ($hasResponse){
            return [
                'message' => 'برای این تیکت قبلا پاسخ ثبت شده است، فقط می توانید پاسخ این تیکت را آپدیت کنید.'
            ];
        }else{
            $response = Response::query()->create( $data );
            $ticket->update([
                'status' => 1
            ]);

            $response->load("ticket");
            return $response;
        }
    }

    public function update( $data , $responseId )
    {
        $response = Response::query()->findOrFail( $responseId );
        $response->update( $data );

        $response->load( "ticket" );
        return $response;
    }
}
