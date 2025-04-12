<?php

namespace App\Http\Controllers\franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ordertracking extends Controller
{
    public function customerordertracking(){
        return view('Franchise.ordertracking');
    }
}
