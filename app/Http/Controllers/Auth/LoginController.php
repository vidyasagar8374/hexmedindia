<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Wallet;
use App\Models\Payment;
use App\Models\Package;
use App\Models\Test;
use App\Models\PackageDetail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function credentials(Request $request)
    {
       
        return [
            'email'     => $request->email,
            'password'  => $request->password,
            'is_verified' => '1'
        ];
    }
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
    public function sendFailedLoginResponse(Request $request)
    {

		$useremail = \DB::table('users')->where('email', $request->email)->first();
      	if(!$useremail){
          throw ValidationException::withMessages([
              $this->username() => 'email not found',
          ]);
        }
        if($useremail->is_verified != 1){
            throw ValidationException::withMessages([
                $this->username() => 'User not activated',
            ]);
        }
      	if($useremail && ! \Hash::check($request->password, $useremail->password)){
         	return redirect()->back()->withErrors(['password' => 'Wrong password entered'])->withInput($request->except('password'));
        }

    }
}
