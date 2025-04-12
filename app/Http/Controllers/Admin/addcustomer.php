<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BookedTest;
use Illuminate\Http\Request;

class addcustomer extends Controller
{
    public function addcustomer(){
        return view('admin.franchiselist');

    }

    public function bookinghistory(){
        return view('admin.bookinghistory');
    }

    public function listcustomers(){
        $customers = BookedTest::where('franchise_id', \Auth::user()->id)
        ->select('mobile',  \DB::raw('count(*) as total'))
        ->groupBy('mobile')
        ->get();
        return view('admin.listcustomers', compact('customers'));
    }
}
