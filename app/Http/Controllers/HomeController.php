<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notification;
use App\Models\Wallet;
use App\Models\BookedTest;
use App\Models\franchiseboys;
use App\Models\User;

use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // \Artisan::call('optimize');
    //  dd(1111111);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        
        $balance = '';
        $todaybookings = '';
        $Bookings = '';
        $totalcustomers = '';
        $franchiseboys = '';
        $nonassigned = '';
        $latestbookings = '';
        $franchiseCount = '';
        $todaybookings = '';
        $Bookings = '';
        $raisedRequest = '';
        $pendingapprovals = '';
        $todaycollection = '';
        $tomorrowcollection = '';
        $totalCollections = '';


        // if(\Auth::user()->id == 1){

            // $franchiseCount = \DB::table('users')->where('role', 2)->where('is_verified', 1)->count();
            // $franchisecount =   User::with('franchiseCount')
            // ->where('id', \Auth::user()->id)
            // ->count();
            // $todaydate = Carbon::now();
            // $tomorrowDate = Carbon::tomorrow();
            $todaydate =  date("Y-m-d");
            $tomorrowDate =  date("Y-m-d", strtotime('tomorrow'));

            if(\Auth::user()->role == 2){
                
          
            $balance = Wallet::where('franchise_id',\Auth::user()->id)->first();
           
            $todaybookings = BookedTest::whereDate('created_at',$todaydate)
            ->where('franchise_id',\Auth::user()->id)
            ->count();
            $Bookings = BookedTest::where('franchise_id', \Auth::user()->id)
           ->count();
           $totalcustomers = BookedTest::where('franchise_id', \Auth::user()->id)
           ->groupBy('mobile')
           ->count();
           $boyscount = BookedTest::where('franchise_id', \Auth::user()->id)
           ->groupBy('mobile')
           ->count();
           $franchiseboys = franchiseboys::where('franchise_owner_id',\Auth::user()->id)
           ->count();
           $latestbookings = BookedTest::latest()->take(5)
           ->where('franchise_id', \Auth::user()->id)
           ->get();
    
           
                $nonassigned = BookedTest::where('date',$todaydate)
                ->where('franchise_id',\Auth::user()->id)
                ->where('boy_id','=', NULL)
                ->count();

            }else if(\Auth::user()->role == 1){
                     $franchiseCount = User::where('role', 2)->where('is_verified', 1)->count();
                     $todaybookings = BookedTest::where('date',$todaydate)
                     ->count();
                     $Bookings = BookedTest::count();
                     $raisedRequest = BookedTest::groupBy('franchise_id')
                     ->where('request_raised', 1)->where('status', 'collection pending')
                     ->count();
                    //  dd($raisedRequest);
                    
                    $pendingapprovals = User::where('role', 2)->where('is_verified', 0)->count();

                    
            }else if(\Auth::user()->role == 3){
                $todaycollection =  BookedTest::where('date',date("Y-m-d"))
                                 ->where('boy_id',\Auth::user()->id)
                                 ->count();
                $tomorrowcollection = BookedTest::where('date', date("Y-m-d", strtotime('tomorrow')))
                ->where('boy_id',\Auth::user()->id)
                ->count();
                $totalCollections = BookedTest::where('boy_id', \Auth::user()->id)->where('status', '!=', 'sample collection pending')->count();
                // dd($totalCollections);

            }

            


             
            
            
            
        // }


        return view('home', compact('balance','todaybookings','Bookings','totalcustomers','franchiseboys','nonassigned','latestbookings','franchiseCount','todaybookings','Bookings','raisedRequest','pendingapprovals','totalCollections','tomorrowcollection','todaycollection'));

    }
    public function userLogout(){
        \Auth::logout();
        return redirect('/login');
    }
}
