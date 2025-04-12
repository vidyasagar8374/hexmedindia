<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Franchiseboy;
use App\Models\BoysAvailibity;
use App\Models\samplecollection;
use App\Models\BookedTest;
use App\Models\notification;
use App\Traits\notificationTrait;
use App\Models\Wallet;
use App\Models\Testdocuments;
use App\Models\transactiondetails;
use App\Exports\TransactionListExport;
use Excel;


class BoysManageController extends Controller
{
    public function manageboys(){
        $boys = Franchiseboy::with(['boydetails'])->where('franchise_owner_id', \Auth::user()->id)->get();
        return view('franchise.boys.manageboys', compact('boys'));
    }
    public function createboy(){
       
        return view('franchise.boys.createnewboy');
    }
    public function insertnewboy(Request $request){
        $validated = $request->validate([
            'email' => 'unique:users'
        ]);
        $createBoy = new User;
        $createBoy->name = $request->name;
        $createBoy->mobile = $request->mobile;
        $createBoy->email = $request->email;
        $createBoy->password = \Hash::make($request->password);
        $createBoy->role = 3;
        $createBoy->is_verified = $request->status;
        $createBoy->save();
        if($request->hasFile('aadhar')){
            $aadhar = time().'aadhar.'.$request->aadhar->extension();  
            $request->aadhar->move(public_path('documents/boys/'. $createBoy->id ), $aadhar);
        }
        if($request->hasFile('pan')){
            $pan = time().'pan.'.$request->pan->extension();  
            $request->pan->move(public_path('documents/boys/'. $createBoy->id ), $pan);
        } if($request->hasFile('licience')){
            $licience = time().'licience.'.$request->licience->extension();  
            $request->licience->move(public_path('documents/boys/'. $createBoy->id ), $licience);
        }
        $boyDetails = new Franchiseboy;
        $boyDetails->user_id = $createBoy->id;
        $boyDetails->address = $request->address;
        $boyDetails->franchise_owner_id = \Auth::user()->id;
        $boyDetails->licience = $licience;
        $boyDetails->aadhar = $aadhar;
        $boyDetails->pan = $pan;
        $boyDetails->save();
        return redirect()->back()->with('message', 'Boy Created successfully');
    }
    public function manageslots(){
        return view('franchise.boys.timeslots');
    }
    public function setavailibity(Request $request){
        try{
            
            $delete  = BoysAvailibity::where('date', $request->date)
            ->where('boy_id', \Auth::user()->id)
            ->where('is_assigned', NULL)
            ->Where('is_force', NULL)
            ->delete();
            foreach($request->timing as $time){
                //dd($time);
                // dd(BoysAvailibity::where('boy_id', \Auth::user()->id)->where('slot', $time)->where('is_assigned', 1)->first());
                if(BoysAvailibity::where('boy_id', \Auth::user()->id)->where('slot', $time)
                ->where('is_assigned', 1)->first()){
                    // \Log::error(111111111);
                }else{
                   //  dd($time);
                   $franchisedetails  = User::with(['boydetails'])->where('id', \Auth::user()->id)->first();
                    $addSlot = new BoysAvailibity;
                    $addSlot->date = $request->date; 
                    $addSlot->slot = $time; 
                    $addSlot->boy_id = \Auth::user()->id; 
                    $addSlot->belongs_to = $franchisedetails->boydetails->franchise_owner_id; 
                    $addSlot->save();
                    $boydetails = User::with(['boydetails'])->where('id', \Auth::user()->id)->first();
                    // franchise_owner_id
                    $data = BookedTest::where('franchise_id', $boydetails->boydetails->franchise_owner_id)
                    ->where('date', $request->date)
                    ->where('time', $time)->where('boy_id', NULL)->update([
                        'boy_id' => \Auth::user()->id,
                    ]);
                    if($data){
                        $boysavailibity = BoysAvailibity::where('id', $addSlot)->update([
                            'is_assigned' => 1,
                        ]);
                    }
                }
                }
                
            // }
            return 1;
        }catch(\Exception $e){
            return 0;
        }
    }
    public function getavailibity(Request $request){
        return BoysAvailibity::where('date', $request->date)->where('boy_id', \Auth::user()->id)->get();
    }
    public function editboys(Request $request,$id)
    {
        $decryptedId = decrypt($id);
        //   dd($decryptedId);
        $franchiseboy = Franchiseboy::find($decryptedId);
       
        $franchiseboy = Franchiseboy::with(['boydetails'])->where('id', $decryptedId)->get();
        
    //   dd($franchiseboy);
        return view('franchise.boys.updateboy', compact('franchiseboy'));
    }
  
    public function updateboy(Request $request)
    {
    // dd($request);

      $updateuser =  User::where('id',$request->user_id )->update([
        'name' => $request->name,
        'mobile' => $request->mobile,
        'email' => $request->email,
        'is_verified' => $request->status
            ]);
            if($request->hasFile('aadhar')){
                $aadhar = time().'aadhar.'.$request->pan->extension();  
                $request->aadhar->move(public_path('documents/boys/'. $request->user_id ), $aadhar);
                $updateaadhar =   Franchiseboy::where('id',$request->id )->update([
            
                   'aadhar' => $aadhar
            
                ]);

            }
    
            if($request->hasFile('pan')){
                $pan = time().'pan.'.$request->pan->extension();  
                $request->pan->move(public_path('documents/boys/'. $request->user_id ), $pan);
                $updateaadhar =   Franchiseboy::where('id',$request->id )->update([
            
                   'pan' => $pan
            
                ]);

            }
            if($request->hasFile('licience')){
                $licience = time().'licience.'.$request->licience->extension();  
                $request->licience->move(public_path('documents/boys/'. $request->user_id ), $licience);
                $updateaadhar =   Franchiseboy::where('id',$request->id )->update([
            
                   'licience' => $licience
            
                ]);

            }
         $updatefranchise =   Franchiseboy::where('id',$request->id )->update([
            
                'address' => $request->address,
                
            
            ]);
           
            // dd($updatefranchise,$updateuser);
            return redirect()->back()->with('message', 'Boy Details updated successfully');


        

    }
    public function testreqform($id){
        $info = BookedTest::with(['testdetails.name', 'packagedetails.pc'])->where('id', $id)->first();
        $data = samplecollection::where('ref_id', $id)->first();
        $documents = Testdocuments::where('test_id', $id)->get();
        // dd($documents); 
        return view('franchise.boys.testreqform', compact('data','info', 'documents'));
    }
    public function testreqformdocuments(Request $request){
       
        // $requestfiel = $request->collection;
        $completedstatus = BookedTest::where('id', $request->id)->update([
            'completed' => 1,
            'status' => 'completed'
        ]);
        if($request->hasFile('collection')){
            foreach($request->collection as $x => $collection){
               
            $collections = $x . time().'collection.'. $collection->extension();  
            $path = 'documents/tests/'. $request->id . '/';
            $collection->move(public_path($path), $collections);
            $details = new Testdocuments;
            $details->test_id = $request->id;
            $details->testdocuments = $path . $collections ;
            $details->save();
        }
    }
        return redirect()->back()->with('message', 'Details  Updated successfully');

       

    }
    public function userprofile(){
        return view('profile.userprofile');
    }
    public function allnotitification(){
        
        $notifications = notification::all();

        return view('notification.allnotification',compact('notifications'));
    }
    public function viewbookdetails(Request $request){
        // dd(1111);
        $notifications = Notification::latest()->take(3)->get();
        $bookdetails = BookedTest::find($request->id);
        return view('profile.userprofile',compact('bookdetails','notifications'));
       
    }
    public function savenotification(Request $request){
        $text = 'new user added successfully';
        $id = \Auth::user()->id;
        $data =  $this->savenotificationTrait($text, $id);
       
    }
    public function transactiondetails(Request $request){
         $admin = \Auth::user()->role;
         $userid = \Auth::user()->id;
         if($admin == 1){
           $transactiondetails = transactiondetails::with(['franchisedetails', 'testdetails'])->orderBy('id', 'desc')->paginate(50);
         }else{
             $transactiondetails = transactiondetails::with(['testdetails'])->where('user_id',$userid)->orderBy('id', 'desc')->paginate(50);
         }
        //  dd($transactiondetails);
        
        
       
    	if ($request->ajax()) {
    		$view = view('admin.transactionfetch',compact('transactiondetails'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('admin.trasactiondetails', compact('transactiondetails'));

    }

    public function exportransactions(Request $request){
        return Excel::download(new TransactionListExport,'transactionslist.xlsx');

    }
    public function transactiondetailsview($id){
        //dd($id);
        return view('admin.trasactiondetailsview');
    }

}
