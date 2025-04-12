<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookedTest;
use App\Models\BoysAvailibity;
use App\Models\Franchiseboy;

class SlotManagmentController extends Controller
{
    public function nonassignedslots(Request $request)
    {
        $data = BookedTest::with(['testdetails', 'boydetails'])->where('franchise_id', \Auth::user()->id)->where('boy_id', NULL)->latest('id')
        ->when($request->date, function ($query) use ($request) {
            return $query->whereDate('date', $request->date);
        })
        ->get();
        $date = '';
        if($request->date){
            $date = $request->date;
        }
        return view('franchise.nonassignedslots', compact('data', 'date'));
    }
    public function changeslot(){
       return  view('franchise.changeslotinfo');
        $data = BookedTest::with(['testdetails', 'boydetails'])->where('franchise_id', \Auth::user()->id)->latest('id')->get();
        return view('franchise.changeslot', compact('data'));
    }
    public function viewslotdata($id){
        $data = BookedTest::with(['testdetails', 'boydetails'])->where('id', $id)->first();
       
        return view('franchise.updateslot', compact('data'));
    }
    public function viewslotdatainfo(Request $request){
        $data = BookedTest::with(['testdetails', 'boydetails'])->where('booking_id', $request->search)->first();
        if($data){
            return view('franchise.updateslot', compact('data'));
        }
        return redirect()->back()->with('message', 'Not Found!');
        
        // dd($request->all());
    }
  
    public function viewbokkedslot($id){
        $data = BookedTest::with(['testdetails', 'boydetails'])->where('id', $id)->first();
        // dd($data);
        // $boys = Franchiseboy::with(['slots' => function ($query) use($data) {
        //         $query->where('date', $data->date); // Example additional condition
        //     }])
        //     ->where('franchise_owner_id', \Auth::user()->id)->get();4
        $boys = Franchiseboy::with(['boydetails', 'slots'])->where('franchise_owner_id', \Auth::user()->id)->get();
        return view('franchise.updateslottoboy', compact('data', 'boys'));
    }
    public function updateslotdetails(Request $request){
        // dd($request->all());
        if($request->boy_id){
        //    dd($request->all());
            $removeExistingBoy = BoysAvailibity::where('boy_id', $request->boy_id)
            ->where('date', $request->datedetails)->where('slot', $request->timedetails)
            // ->get();
            ->update([
                'is_assigned' => NULL
            ]);
            
            // dd($removeExistingBoy);
        }
        $removeBoy = BookedTest::where('id', $request->id)->update([
            'boy_id' => NULL,
            'date' => $request->date,
            'time' => $request->time
        ]);
        $assignBoy = BoysAvailibity::where('date', $request->date)->where('slot', $request->time)->whereNull('is_assigned')->first();
        if($assignBoy != null){
            $updateBoy = BookedTest::where('id', $request->id)->update([
                'boy_id' => $assignBoy->boy_id,
            ]);
            $closeBoy = BoysAvailibity::where('id', $assignBoy->id)->update([
                'is_assigned' => 1,
            ]);
        }
        return redirect()->route('changeslot')->with('success', 'Sample collection slot updated successfully!');

    }
}
