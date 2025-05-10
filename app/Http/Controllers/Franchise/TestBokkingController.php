<?php

namespace App\Http\Controllers\franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\BookedTest;
use App\Models\Wallet;
use App\Models\User;
use App\Models\BoysAvailibity;
use App\Models\TestBokkingDetail;
use App\Models\Package;
use App\Models\notification;
use Carbon\Carbon;
use App\Traits\SaveTextAndIdTrait;
use App\Exports\BookingHistory;
use Maatwebsite\Excel\Facades\Excel;
// use notificationTrait;


class TestBokkingController extends Controller
{
   use SaveTextAndIdTrait;
   
    public function booktest(){
        $tests = Test::where('isactive', 'Active')->get();
        $packages = Package::where('is_active', 'Active')->get();
        return view('franchise.testbook', compact('tests', 'packages'));
    }
    public function booknewtest(Request $request){
       
        $requestdata = $request->all();
    //   dd($request->all());
        
        // $price = explode(",", $request->test);
        // if(Wallet::where('franchise_id',\Auth::user()->id)->pluck('amount')->first() >= $price[1]){
            // Wallet::where('franchise_id',\Auth::user()->id)->decrement('amount', $price[1]); 
            
            // return view('billing.bill', compact('requestdata', 'test'));
            $test = 'hex-' . Carbon::now()->timestamp;
            $booking_id = 'hex-HY-' . Carbon::now()->timestamp;
            \Session::put('data', $requestdata);
            \Session::put('booking_id', $booking_id);
            $time = Carbon::now()->toDateTimeString();



            $text= 'you have booked test';
            $id = \Auth::user()->id;
            $result = $this->savenotificationTrait($text, $id);
            $addressdetails = User::where('id', \Auth::user()->id)->with(['franchisedetails'])->first();
            return view('billing.bill', compact('requestdata', 'test', 'time', 'booking_id', 'addressdetails'));

            // return redirect()->route('billing');
            // return redirect()->back()->with('success', 'Sample collection slot booked successfully!');

        // }else{
        //     return redirect()->back()->with('message', 'You dont have sufficient wallet balance!');
        // }
    }
    public function billing(Request $request)
    {
        $discountinfo = $request->all();
        $details = \Session::get('data');
        $test = new BookedTest;
        $test->booking_id = \Session::get('booking_id');
        
            $test->name = $details['name'];
            $test->email = $details['email'];
            $test->mobile = $details['number'];
            $test->address = $details['address'];
             $test->dateofbirth = $details['dateofbirth'];
            $test->dob = $details['age'];
            $test->cashtype = $details['cashtype'];
            $test->city = $details['city'];
            $test->dep = $details['dep'];
            $test->ref_doctor = $details['ref_doctor'] ?? '';
            
            $test->date = $details['date'];
            $test->time = $details['time'];
            $test->testtype = $details['testtype'];
            $test->gender = $details['gender'];
            // $test->test_id = $price[0];
            // $test->price = $price[1];
            $test->status = "sample collection pending";
            $test->franchise_id = \Auth::user()->id;
            $test->save();
            // dd($test);

            // 
            session()->forget('data');
            session()->forget('booking_id');
// dd($details);
            if(isset($details['tests'])){
                foreach($details['tests'] as $x => $testd){
    
                    $price = explode(",", $testd);
                    $create = new TestBokkingDetail;
                    $create->test_id = $price[0];
                    $create->deduct_price = $price[3];
                    $create->actual_price = $price[1];
                    $create->discount_value = $discountinfo['testdetailsval'][$x];
                    $create->discount_percentage = $discountinfo['testdetailsper'][$x];
                    $create->is_package = 0;
                    $create->ref_id = $test->id;
                    $create->save();
                }
            }
            if(isset($details['packages'])){
                foreach($details['packages'] as $x => $package){
             
                    $price = explode(",", $package);
                    $create = new TestBokkingDetail;
                    $create->test_id = $price[0];
                    $create->deduct_price = $price[3];
                    $create->actual_price = $price[1];
                    $create->discount_value = $discountinfo['packagedetailsval'][$x];
                    $create->discount_percentage = $discountinfo['packagedetailsper'][$x];
                    $create->is_package = 1;
                    $create->ref_id = $test->id;
                    $create->save();
                }
    
            }
            if($details['testtype'] == 1)
            {
                $assignBoy = BoysAvailibity::where('date', $details['date'])->where('belongs_to', \Auth::user()->id)->where('slot', $details['time'])->whereNull('is_assigned')->first();
                if($assignBoy != null){
                    $updateBoy = BookedTest::where('id', $test->id)->update([
                        'boy_id' => $assignBoy->boy_id,
                    ]);
                    $closeBoy = BoysAvailibity::where('id', $assignBoy->id)->update([
                        'is_assigned' => 1,
                    ]);
                }
            }
            return true;
            

    }
    public function billingsuccess(){
        return redirect()->route('booktest')->with('success', 'Sample collection slot booked successfully!');
    }
    
    public function bookinghistory(Request $request){
    //   dd('bug fixing in progress');
    //   $download = 'select uuid,cumstomer,test';
        // $notifications = Notification::latest()->take(3)->get();
        $franchise = \DB::table('users')->where('role', 2)->where('is_verified', 1)->select('id', 'name', 'email')->get();
        if(\Auth::user()->role == 1)
        {
            $data = BookedTest::with(['testdetails.name', 'packagedetails.pc', 'boydetails','frachisedetails'])
            ->latest('id')
                
            ->when($request->date, function ($query) use ($request) {
                return $query->whereDate('created_at', $request->date);
            })
             ->when($request->franchise_id, function ($query) use ($request) {
                return $query->where('franchise_id', $request->franchise_id);
            })
            
            // ->when($request->name, function ($query) use ($request) {
            //     return $query->whereHas('testdetails', function ($subQuery) use ($request) {
            //         $subQuery->where('name', 'like', '%' . $request->name . '%');
            //     });
            // })
        //    ->get();
        //     dd(count($data));
            ->paginate(1500);
            // dd($data);
            $date = '';
            if($request->date){
                $date = $request->date; 
            }
            // echo "<pre>";
            // print_r($data);
            // exit;
            return view('admin.bookinghistory', compact('data', 'date', 'franchise'));
        }else{
            // dd(111111111111111);
            $data = BookedTest::with(['testdetails.name', 'packagedetails.pc', 'boydetails'])
            ->where('franchise_id', \Auth::user()->id)->latest('id')
                
            ->when($request->date, function ($query) use ($request) {
                return $query->whereDate('created_at', $request->date);
            })
            // ->when($request->name, function ($query) use ($request) {
            //     return $query->whereHas('testdetails', function ($subQuery) use ($request) {
            //         $subQuery->where('name', 'like', '%' . $request->name . '%');
            //     });
            // })
            ->get();
            // dd($data);
            $date = '';
            if($request->date){
                $date = $request->date;
            }
            return view('admin.bookinghistory', compact('data', 'date'));
        }
        
    }
    public function bookinghistoryExpory()
{

    return Excel::download(new BookingHistory, 'bookingHistory.xlsx');
}
    public function viewtestdetails($id){
        $tests = Test::where('isactive', 'Active')->get();
        $data = BookedTest::with(['testdetails', 'boydetails'])->where('id', $id)->first();
        return view('franchise.viewtestdetails', compact('data', 'tests'));
    }
    public function updatetest(Request $request){
        try{
            $updateTest = BookedTest::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->number,
                'address' => $request->address,
                'city' => $request->city,
                'date' => $request->date,
                'gender' => $request->gender,
            ]);
            return redirect()->back()->with('success', 'Details updated successfully!'); 
        }catch(\Exception $e){
            return redirect()->back()->with('success', 'Something Went wrong please tryagain!'); 
            
        }
    }
    public function bokkedtestdetails($id){
        $data = BookedTest::with(['testdetails', 'boydetails'])->where('id', $id)->first();
        return view('franchise.viewbokkedtestdetails', compact('data'));
    }
    public function updateslottoboys(Request $request)
    {
        $data = BookedTest::where('id', $request->id)->update([
            'boy_id' => $request->boy_id
        ]);
        $closeBoy = BoysAvailibity::where('id', $request->boy_id)->where('date', $request->datedetails)
        ->where('slot', $request->timedetails)
        ->update([
            'is_assigned' => 1,
        ]);
        if(!$closeBoy){
            $closeBoy = new BoysAvailibity;
            $closeBoy->boy_id =  $request->boy_id;
            $closeBoy->date = $request->datedetails;
            $closeBoy->slot = $request->timedetails;
             $closeBoy->belongs_to = \Auth::user()->id;
            $closeBoy->is_assigned = 1;
            $closeBoy->is_force = 1;
            $closeBoy->save();
        }
        return redirect()->back()->with('success', 'boy details updated successfully!'); 

    }
    public function recivedsamples(Request $request)
    {
        $data = BookedTest::with(['testdetails.name', 'packagedetails.pc', 'boydetails'])
        ->where('admin_recived', 1)->latest('id')
        ->when($request->date, function ($query) use ($request) {
            return $query->whereDate('date', $request->date);
        })
        ->get();
        $date = '';
        if($request->date){
            $date = $request->date;
        }
        return view('admin.recivedsamples', compact('data', 'date'));
    }
    public function bill(Request $request){
         $requestdata = BookedTest::with(['testdetails.name', 'packagedetails.pc',])->where('id',$request->id)->first();
          $addressdetails = User::where('id', \Auth::user()->id)->with(['franchisedetails'])->first();
        //   dd($addressdetails);
        return view('billing.billprint', compact('requestdata', 'addressdetails'));
        dd($request->all());
    }
}
