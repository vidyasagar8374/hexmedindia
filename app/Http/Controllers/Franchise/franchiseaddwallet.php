<?php

namespace App\Http\Controllers\franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class franchiseaddwallet extends Controller

{
    public function addwallet(){
        return view('franchise.franchiseaddwallet');
    }

    public function invoice(){
        return view('franchise.invoice');
    }
    public function transactionfail(){
        return view('franchise.transactionfail');
    }
}
