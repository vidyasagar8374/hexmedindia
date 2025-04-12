<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FranchisetestBookingController extends Controller
{
    public function booktest(){
        return view('franchise.testbook');
    }
}
