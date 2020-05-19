<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeUpdatesRequest;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function postSubscribe(SubscribeUpdatesRequest $request)
    {
        // @todo add e-mail validation

        $subscription = Subscriber::create([
            'email' => $request->get('email'),
            'country' => $request->get('country'),
        ]);

        return ['subscription' => $subscription];
    }
}
