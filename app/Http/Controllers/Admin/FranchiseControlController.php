<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\ContactForm;
use App\Models\Test;
use App\Models\PackageDetail;

class FranchiseControlController extends Controller
{
    public function franchiselist()
    {
        // $franchisewallet = 
        
        $franchise = User::with('franchisedetails')->where('role', 2)->latest('id')->get();
        return view('admin.franchiselist', compact('franchise'));
    }
    public function franchisedetails($id){
        $franchiseId = decrypt($id);
        $details = User::with(['franchisedetails', 'tolietimages'])->where('id', $franchiseId)->first();
        return view('admin.franchisedetailsview', compact('details'));
    }
    public function approvefranchise(Request $request){
        try{
            $approveOrReject = User::where('id', $request->id)->update([
                'is_verified' => $request->status
            ]);
            if($request->status == 1){
                return response()->json([
                    'success' => true,
                    'message' => 'approved'
                ]);
            }else if($request->status == 2){
                return response()->json([
                    'success' => true,
                    'message' => 'rejected'
                ]);
            }
            
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
            ]);
        }
        
    }


    public function listoffranchise(){
        $franchises = User::where('role',2)->get();
        return view('admin.listoffranchise', compact('franchises'));
    }

    
    public function franchisewallet(){
        $balance = Wallet::where('franchise_id',\Auth::user()->id)->first();
        if(!$balance){
            $balance = new Wallet;
            $balance->franchise_id = \Auth::user()->id;
            $balance->amount = 0;
            $balance->save();
        }
        $transistions = Payment::where('logged_user_id', \Auth::user()->id)->latest('id')->get();
        return view('admin.franchisewallet', compact('balance', 'transistions'));
    }
    public function packagelist()
    {
        $packages = Package::latest('id')->get();
        return view('admin.package', compact('packages'));
    }
    public function createpackage()
    {
        return view('admin.createpackage');
    }
    public function createnewpackage(Request $request)
    {
        $create = new Package;
        $create->package = $request->name;
        $create->price = $request->price;
        $create->cut_price = $request->adminprice;
        $create->is_active = $request->status;
        $create->save();
        return redirect()->back()->with('message', 'Package Created');
    }
    public function editpackagelist(Request $request){
        $packageid = $request->id;
        $packagedetails = Package::find($packageid);
        //  dd($packagedetails);
        return view('admin.updatepackage', compact('packagedetails'));

    }
    public function updatepackage(Request $request){
        
        $updatepackage = Package::find($request->id);
        try{
            $updatepackage = Package::where('id', $request->id)->update([
                'package' => $request->name,
                'price' => $request->price, 
                'cut_price' => $request->adminprice, 
                'is_active' => $request->status
            ]);
            return redirect()->route('packagelist')->with('message', 'Package Updated Successfully');
        }catch(Exception $e){
            return response()->json([
                'success' => false,
            ]);
        }
    }
    public function assignpackage()
    {
        $data = Package::with(['details.testdetails'])->get();
        // dd($data);
        return view('admin.assignpackage', compact('data'));
    }
    public function assigntesttopackage()
    {
        $packages = Package::where('is_active', 'Active')->get();
        $tests = Test::where('isactive', 'Active')->get();
        return view('admin.assignpackagetest', compact('packages', 'tests'));
    }
    public function assignpackagetotest(Request $request)
    {
        // if(!PackageDetail::where('package_id', $request->package)->first()){
            foreach($request->tests as $t){
            if(!PackageDetail::where('package_id', $request->package)->where('test_id', $t)->first()){
                $package = new  PackageDetail;
                $package->package_id = $request->package;
                $package->test_id = $t;
                $package->save();
            }
        }
        return redirect()->back()->with('message', 'Package Created');

        
        
    }

    public function support(Request $request)
    {
        // Validate the form data (if needed)
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'mob_num' => 'required|string|max:20',
        //     'describe_issue' => 'required|string',
        // ]);
    
        // Save form data to the database
        $details = new ContactForm;
        $details->name = $request->name;
        $details->email = $request->email;
        $details->mob_num = $request->mob_num;
        $details->describe_issue = $request->Describe_issue;
        $details->user_id = \Auth::user()->id;
        $details->save();
     return redirect()->back()->with('message', 'Ticket Raised');
        // Redirect back with success message
       
    }
    public function sisreport(){
        return view('admin.sisreport');
    }
    
}
