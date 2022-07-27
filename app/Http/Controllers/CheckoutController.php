<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function proccess(Request $request)
    {
        // save user data to database
        // $user = Auth::user();
        // $user->update($request);
    }

    public function callback()
    {
    }
}
