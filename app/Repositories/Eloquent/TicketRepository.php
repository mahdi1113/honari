<?php

namespace App\Repositories\Eloquent;

use App\Models\Ticket;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TicketRepository implements TicketRepositoryInterface
{
    public function index()
    {
        $tickets = Ticket::with('course','response')->paginate();
        return $tickets;
    }
    public function indexOnline()
    {
        $userId = Auth::user()->id;
        $tickets = Ticket::where('user_id', $userId)
            ->whereHas('course', function ($query) use ($userId) {
                $query->whereHas('purchases', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
            })
            ->with('course', 'response')
            ->paginate();
        return $tickets;
    }

    public function show( $ticketId )
    {
        $ticket = Ticket::findOrFail( $ticketId );
        $ticket->load( 'course','response' );
        return $ticket;
    }

    public function showOnline( $ticketId )
    {
        $ticket = Ticket::findOrFail( $ticketId );
        $ticket->load( 'course','response' );
        return $ticket;
    }
    public function storeOnline(array $data)
    {
        $userId = Auth::id();
        $ticketCount = Ticket::where('user_id', '=', $userId)
            ->where('course_id', '=', $data['course_id'])
            ->count();
        if ($ticketCount > 2){
            return [
                'message' => 'کاربر گرامی تعداد تیکت های شما به پایان رسیده است.'
            ];
        }else{
            $data['user_id'] = Auth::id();
            $ticket = Ticket::query()->create($data);
            return $ticket;
        }

    }

    public function updateOnline(array $data, int $ticketId)
    {
        $ticket = Ticket::findOrFail( $ticketId );
        $hasResponse = $ticket->response()->exists();

        if ($hasResponse){
            return [
                'message' => 'کاربر گرامی پاسخ این تیکت داده شده متاسفانه نمی توانید این تیکت را آپدیت کنید.'
            ];
        }else{
            $ticket->update( $data );

            $ticket->load( "course" );
            return $ticket;
        }
    }
}
