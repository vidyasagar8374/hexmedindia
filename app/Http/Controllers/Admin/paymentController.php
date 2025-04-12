<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class paymentController 
{
    public function payment(){
        return view('admin.paymenthistory');
    }
}
