<?php

namespace App\Http\Controllers\Admin;

use App\EmailSubscription;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers = EmailSubscription::all();
        return view('admin.email-subscribers.index', compact('subscribers'));
    }
}
