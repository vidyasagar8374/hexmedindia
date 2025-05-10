<?php

namespace App\Http\Controllers\franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profile extends Controller
{
    public function franchiseprofile(){
        $users = User::with(['franchisedetails'])->where('id', \Auth::user()->id)->first();
        // dd($users);
        return view('franchise.profile', compact('users'));
    }
  public function updatepofilepasswd(Request $request)
{
    $request->validate([
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
        ],
        'confirm-password' => 'required|same:password',
    ]);

    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->save();

    Auth::logout(); 

    return redirect()->route('login')->with('success', 'Password updated successfully. Please log in with your new password.');
}
}
