<?php

namespace App\Http\Controllers\Ajax;

use App\User;
use App\Notifications\SupportTicket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SupportController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendTicket(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|max:999999999999',
            'subject' => 'required|string|max:250',
            'message' => 'required|string|max:2000',
        ]);

        Notification::route('mail', config('services.support.email'))
            ->notify(new SupportTicket(
                $request->email,
                $request->phone,
                $request->subject,
                $request->message
            ));

        return response()->json([]);
    }
}
