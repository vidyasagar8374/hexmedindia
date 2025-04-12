<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\franchiseimages;
use App\Models\FranchiseOwnerDetails;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\confirmationFranchise;
use Mail;

class FranchiseRegistrationController extends Controller
{
    public function sisRegister()
    {
        
       // dd(\Artisan::call('optimize'));
        //  $data = array('name'=>"Virat Gandhi");
   
    //   Mail::send(['text'=>'mail'], $data, function($message) {
    //      $message->to('chanduakula111@gmail.com', 'Tutorials Point')->subject
    //         ('Laravel Basic Testing Mail');
    //      $message->from('xyz@gmail.com','Virat Gandhi');
    //   });
    //   echo "Basic Email Sent. Check your inbox.";
      
      
      
        $states = \DB::table('states')->get();
        $sis = 1;
        return view('franchise.register', compact('states', 'sis'));
    }
    public function franchiseRegister()
    {
        
       // dd(\Artisan::call('optimize'));
        //  $data = array('name'=>"Virat Gandhi");
   
    //   Mail::send(['text'=>'mail'], $data, function($message) {
    //      $message->to('chanduakula111@gmail.com', 'Tutorials Point')->subject
    //         ('Laravel Basic Testing Mail');
    //      $message->from('xyz@gmail.com','Virat Gandhi');
    //   });
    //   echo "Basic Email Sent. Check your inbox.";
      
      
      
        $states = \DB::table('states')->get();
        return view('franchise.register', compact('states'));
    }
    public function franchisesubmitregistration(Request $request){
        // dd(\Artisan::call('optimize'));
         
        //   $data = [
        //                 'name' => $request->name,
        //             ];
        //             $franchisemail = "chanduakula111@gmail.com";
                    
        //                 Mail::to($franchisemail)->send(new confirmationFranchise($data));
                    
                
              //  dd($request->all());

        $validated = $request->validate([
            'email' => 'unique:users'
        ]);
        $Franchise = new User;
        $Franchise->name = $request->fullname;
        $Franchise->email = $request->email;
        $Franchise->mobile = $request->mobile;
         $Franchise->sis = $request->is_sis;
        $Franchise->password = Hash::make($request->password);
        $Franchise->role = 2;
        $Franchise->is_verified = 0;
        $Franchise->save();
        if($request->hasFile('aadhar')){
            $aadhar = time().'aadhar.'.$request->aadhar->extension();  
            $request->aadhar->move(public_path('documents/franchise/'. $Franchise->id ), $aadhar);
        }
        if($request->hasFile('pan')){
            $pan = time().'pan.'.$request->pan->extension();  
            $request->pan->move(public_path('documents/franchise/'. $Franchise->id ), $pan);
        } 
        if($request->hasFile('licience')){
            $licience = time().'licience.'.$request->licience->extension();  
            $request->licience->move(public_path('documents/franchise/'. $Franchise->id ), $licience);
        }
        if($request->hasFile('labour')){
            $labour = time().'labour.'.$request->labour->extension();  
            $request->labour->move(public_path('documents/franchise/'. $Franchise->id ), $labour);
        }
        if($request->hasFile('bio')){
            $bio = time().'bio.'.$request->bio->extension();  
            $request->bio->move(public_path('documents/franchise/'. $Franchise->id ), $bio);
        }
        if($request->hasFile('rental')){
            $rental = time().'rental.'.$request->rental->extension();  
            $request->rental->move(public_path('documents/franchise/'. $Franchise->id ), $rental);
        }
        if(isset($request->toilets )){
       
        foreach($request->toilets as $x => $toilet){
            // if($request->hasFile('toilet')){
            $toiletname = time().'toilet'. $x . $toilet->extension();  
            $toilet->move(public_path('documents/franchise/'. $Franchise->id ), $toiletname);
            \DB::table('franchisetoilets')->insert([
                'franchise_id' => $Franchise->id,
                'images' => $toiletname,
                 'is_toilet' => 1,
            ]);
            
        }
             
        }
        
        
        if(isset($request->collection )){
        foreach($request->collection as $x => $collectionimage){
            // if($request->hasFile('toilet')){
            $collectionimagename = time().'collectionimage'. $x . $collectionimage->extension();  
            $collectionimage->move(public_path('documents/franchise/'. $Franchise->id ), $collectionimagename);
            \DB::table('franchisetoilets')->insert([
                'franchise_id' => $Franchise->id,
                'images' => $collectionimagename,
                'is_toilet' => 0,
            ]);
            
        }
        }
        
        // if($request->hasFile('collection')){
        //     $collection = time().'collection.'.$request->collection->extension();  
        //     $request->collection->move(public_path('documents/franchise/'. $Franchise->id ), $collection);
        // }
        $details = new FranchiseOwnerDetails;
        $details->aadhar = $aadhar ?? '';
        $details->pan = $pan ?? '';
        $details->licience = $licience ?? '';
        $details->labour = $labour ?? '';
        $details->bio = $bio ?? '';
        $details->dob = $request->dob;
        $details->rental = $rental ?? '';
        $details->gender = $request->gender ?? '';
        $details->state = $request->state ?? '';
        $details->city = $request->city ?? '';
        $details->pincode = $request->pincode ?? '';
        $details->address = $request->address ?? '';
        $details->about = $request->about ?? '';
        $details->tradename = $request->tradename ?? '';
        $details->franchise_id = $Franchise->id ?? '';
        $details->save();
        
               
        if($request->is_sis == 1){
          return redirect()->back()->with('message', 'SIS details have been sent for verification. You will receive a confirmation email after approval'); 
        }
        return redirect()->back()->with('message', 'Franchise details have been sent for verification. You will receive a confirmation email after approval');
        // return redirect()->back()->withSuccess('Franchise details send for verification, you will get confirmation mail when it is approved!');
    }
    public function sisreport(){
        dd(1111111111111);
    }
}


