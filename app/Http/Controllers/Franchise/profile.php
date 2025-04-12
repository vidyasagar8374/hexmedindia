<?php

namespace App\Http\Controllers\franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class profile extends Controller
{
    public function franchiseprofile(){
        $users = User::with(['franchisedetails'])->where('id', \Auth::user()->id)->first();
        // dd($users);
        return view('franchise.profile', compact('users'));
    }
}
