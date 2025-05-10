<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\samplecollection;
use App\Models\BookedTest;
use App\Models\User;
use App\Models\Wallet;
use App\Models\product;
use App\Models\cart;
use App\Models\orders;
use App\Models\transactiondetails;
use App\Models\orderproducts;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Traits\TransactionTrait;
use App\Models\addwallet;
use DB;

class samplecollectioncontroller extends Controller
{
     use TransactionTrait;
    public function samplecollectionform(Request $request){
        if(samplecollection::where('ref_id', $request->id)->first()){
            $sample_collection = samplecollection::where('ref_id', $request->id)->update([
                'dr_name' => $request->testreqName_dr_name,
                'ref_id' => $request->id,
                'hospital_city' => $request->testreqName_Hospital,
                'contact' => $request->testreqName_Contact,
                'specimen_collection' => $request->testreqName_Specimen_Collection_Collected,
                'date_time' => $request->testreqName_Date_and_Time,
                'storage' => $request->testreqName_sample_received,
                'clinical_details' => $request->testreqName_Clinical_Details,
                'test_name' => $request->testreqName_Profile,
                'specimen_type' => $request->testreqSpecimenType,
                'total_num_of_con' => $request->testreqContainers,
                'spiceman_clctd_by' => $request->testreqSpecimen,
                'date_of_shipment' => $request->testreqShipment,
                'no_of_samples_recieved' => $request->testreqSampleReceived,
                'storage_condition' => $request->testreqStorageCondition,
                'recieved_date_time' => $request->testreqReceivedDateandTime,
            ]);
        }else{
            $sample_collection = new samplecollection;
            $sample_collection->dr_name = $request->testreqName_dr_name;
            $sample_collection->ref_id = $request->id;
            $sample_collection->hospital_city = $request->testreqName_Hospital;
            $sample_collection->contact = $request->testreqName_Contact;
            $sample_collection->specimen_collection = $request->testreqName_Specimen_Collection_Collected;
            $sample_collection->date_time = $request->testreqName_Date_and_Time;
            $sample_collection->storage = $request->testreqName_sample_received;
            $sample_collection->clinical_details = $request->testreqName_Clinical_Details;
            $sample_collection->test_name = $request->testreqName_Profile;
            $sample_collection->specimen_type = $request->testreqSpecimenType;
            $sample_collection->total_num_of_con = $request->testreqContainers;
            $sample_collection->spiceman_clctd_by = $request->testreqSpecimen;
            $sample_collection->date_of_shipment = $request->testreqShipment;
            $sample_collection->no_of_samples_recieved = $request->testreqSampleReceived;
            $sample_collection->storage_condition = $request->testreqStorageCondition;
            $sample_collection->recieved_date_time = $request->testreqReceivedDateandTime;
            $sample_collection->save();
            $testType = BookedTest::where('id', $request->id)->pluck('testtype')->first();
            $status = 'recived';
            if($testType == 1){
                $status = 'sample collected';
            }
            $updateStatus = BookedTest::where('id', $request->id)->update([
                'status' => $status
            ]);
        }
       
        return redirect()->back()->with('message', 'details updated successfully!');
    }

    public function samplecollectionformrecived(Request $request)
    {
        $updatestatus = BookedTest::where('id', $request->id)->update([
            'status' => 'recived'
        ]);
        return redirect()->back()->with('message', 'updated successfully!');
    }
    public function samplesrecived(){
        $samples = BookedTest::with(['testdetails.name', 'packagedetails.pc', 'boydetails'])->where('status', 'recived')->where('franchise_id', \Auth::user()->id)->get(); 
    //    dd($samples);
        return view('franchise.recivedslots', compact('samples'));
    }
    public function raiserequest(Request $request){
        
         try{
                $trans = 'HEX-' . Carbon::now()->timestamp;
                $sampleids = $request->sample;
          
                $totalPrice = \DB::table('booked_test_details')->whereIn('ref_id', $sampleids)->sum('deduct_price');
               // dd($totalPrice);
               if(\Auth::user()->sis == 1){
                    DB::beginTransaction();
                    // Wallet::where('franchise_id',\Auth::user()->id)->decrement('amount', $totalPrice); 
                    $transicationdetails = new transactiondetails;
                    $transicationdetails->user_id = \Auth::user()->id;
                    $transicationdetails->text = 'Test Bokking Request';
                    $transicationdetails->amount = 0;
                    $transicationdetails->payment_ref = $trans;
                    $transicationdetails->info = 'test bokking';
                    $transicationdetails->is_positive = 'NO';
                    $transicationdetails->save();
                    foreach($request->sample as $data)
                    {
                        // dd($data);
                        // $totalprice = booked_test_details 
                        $reiseRequest = BookedTest::where('id', $data)->update([
                            'request_raised' => 1,
                            'status' => 'collection pending',
                            'payment_ref' => $trans
                        ]);
                    }
                    DB::commit();
                    return redirect()->back()->with('message', 'Request Raised successfully!');
               }
              
                if(($totalPrice + 2000) <= Wallet::where('franchise_id',\Auth::user()->id)->pluck('amount')->first()){
                    DB::beginTransaction();
                    Wallet::where('franchise_id',\Auth::user()->id)->decrement('amount', $totalPrice); 
                    $transicationdetails = new transactiondetails;
                    $transicationdetails->user_id = \Auth::user()->id;
                    $transicationdetails->text = 'Test Bokking Request';
                    $transicationdetails->amount = $totalPrice;
                    $transicationdetails->payment_ref = $trans;
                    $transicationdetails->info = 'test bokking';
                    $transicationdetails->is_positive = 'NO';
                    $transicationdetails->save();
                    foreach($request->sample as $data)
                    {
                        // dd($data);
                        // $totalprice = booked_test_details 
                        $reiseRequest = BookedTest::where('id', $data)->update([
                            'request_raised' => 1,
                            'status' => 'collection pending',
                            'payment_ref' => $trans
                        ]);
                    }
                    DB::commit();
                    return redirect()->back()->with('message', 'Request Raised successfully!');
                }
                return redirect()->back()->with('message', 'You dont have sufficient wallet balance!');
            }catch (\Exception $e) {
                DB::rollback();
                  return redirect()->back()->with('message', 'Something went wrong');
            }
       

        
    }
    public function collectionrequests(){
        $franchise = User::with(['requestdetails.frachisedCollections'])->where('role', 2)->where('is_verified', 1)->get();
        // dd($franchise);
        // echo "<pre>";
        // var_dump($franchise);
        // exit;

        // $data = BookedTest::where('status', 'collection pending')->where('request_raised', 1)->get();
        return view('admin.collectionrequest', compact('franchise'));
    }
    public function collectiondata(){
        // dd();
        $data = BookedTest::with(['testdetails.name', 'packagedetails.pc'])->where('date', date('Y-m-d'))->where('boy_id', \Auth::user()->id)->get();
        return view('boys.slots', compact('data'));
    }
    public function collectiondatatommorow()
    {
        $data = BookedTest::with(['testdetails.name', 'packagedetails.pc'])->where('date', date("Y-m-d", strtotime('tomorrow')))->where('boy_id', \Auth::user()->id)->get();
        return view('boys.slots', compact('data'));
    }
    public function requestraised(){
        $samples = BookedTest::with(['testdetails.name', 'packagedetails.pc'])->where('franchise_id', \Auth::user()->id)->where('request_raised', 1)->where('status', 'collection pending')->get();
        return view('franchise.raisedrequests', compact('samples'));
    }
    public function approverequests($id){
        $id = decrypt($id);
        $samples = BookedTest::with(['testdetails.name', 'packagedetails.pc'])->where('franchise_id', $id)->where('request_raised', 1)->where('status', 'collection pending')->get();
        $boys = \DB::table('collection_agents')->where('status', 1)->get();
        return view('admin.assignboys', compact('samples', 'boys', 'id'));
    }
    public function assignboyconfirm(Request $request){
        // dd($request->all());
        foreach($request->sample_id as $sample){
            BookedTest::where('id', $sample)->update([
                'status' => 'Ready for collection',
                'request_raised' => 2,
                'agent_id' => $request->boyid
            ]);
        }
        return redirect()->route('collectionrequests')->with('message', 'Boy Allocated!');

        
        
        dd('in progress');
    }


  

    public function bookinghistroysamples(Request $request){
        // $notifications = Notification::latest()->take(3)->get();

        $data = BookedTest::with(['testdetails.name', 'packagedetails.pc', 'boydetails'])
        ->where('franchise_id', \Auth::user()->id)->latest('id')
            
        // ->when($request->date, function ($query) use ($request) {
        //     return $query->whereDate('date', $request->date);
        // })
        // ->when($request->name, function ($query) use ($request) {
        //     return $query->whereHas('testdetails', function ($subQuery) use ($request) {
        //         $subQuery->where('name', 'like', '%' . $request->name . '%');
        //     });
        // })
        ->get();
        
        $date = '';
        if($request->date){
            $date = $request->date;
        }
        return view('admin.bookinghistorysample', compact('data', 'date'));
    }

    public function collectionsrecived()
    {
        return view('admin.collectionupdate');
    }
    public function admincollectionupdate(Request $request)
    {
        $details = BookedTest::where('booking_id', $request->search)->first();
        if($details){
            if($details->admin_recived == 1){
                return redirect()->back()->with('message', 'Already Updated!');
            }
            BookedTest::where('booking_id', $request->search)->update([
                'admin_recived' => 1,
                'status' => 'sample recived'
            ]);
            return redirect()->back()->with('message', 'Status Updated!');
        }
        return redirect()->back()->with('message', 'Not Found!');

    }
    
     public function products(){
        return view('admin/products.products');
    }
    public function insertProducts(Request $request){
        
        $sql = new product;
        $sql->name = $request->name;
        $sql->description     = $request->description;
        $sql->price     = $request->price;
        $sql->status     = $request->status;
        $sql->dimensions     = $request->dimensions;
        $sql->save();
        if($sql){
            return redirect()->back()->with('message', 'Created Successfully!');
        }


    }
    public function productsindex(){

        $products = product::all();
        return view('admin/products.productindex',compact('products'));

    }
    public function productedit(Request $request){
        $product = product::find($request->id);
        return view('admin/products.viewproduct',compact('product'));
    }
    public function insertproductedit(Request $request){
        $current = Carbon::now();
        $updateproduct =  product::where('id',$request->id )->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'dimensions' =>$request->dimensions,
            'status' => $request->status,
            'updated_at' =>$current,
         ]);
            if($updateproduct){
                return redirect()->back()->with('message', 'Updated Successfully');
            }    
        
    }
    
    public function productslist(){
        $products = product::where('status', '1')->get();
        return view('franchise/productindex',compact('products'));

    }

    public function addcart(Request $request){
        $userid = \Auth::user()->id;
       // dd( $request->productId);
        if(\DB::table('cart')->where('user_id', $userid)->where('prodcut_id', $request->productId)->first()){
            return response()->json([
                'success' => false,
            ]);
        }else{
            $addcart = new cart;
            $addcart->user_id =  $userid ;
            $addcart->prodcut_id =  $request->productId;
            $addcart->quantity =  (int)$request->quantity;
            $addcart->save();
            return response()->json([
                'success' => true,
            ]);
        }
        
        
    }
    public function cartlist(){
        $cartlists = cart::with('cartlist')->where('user_id',\Auth::user()->id)->get();
     // dd($cartlists);
     $walletbalance = \DB::table('wallet_balance')->where('franchise_id', \Auth::user()->id)->pluck('amount')->first();
        return view('franchise/cartindex',compact('cartlists', 'walletbalance'));


    }
    public function deletecart(Request $request){
        // dd($request->id);
        $item = cart::find($request->id);
        if ($item) {
            $item->delete();
return redirect()->route('cartlist')->with('message', 'deleted successfully');
        } else {

return redirect()->route('cartlist')->with('message', 'Something went wrong');
        }

    }
    public function addorder(Request $request){
        $trans = 'HEX-' . Carbon::now()->timestamp;
        $deductamount = 0;
        $decodedCartlist = json_decode(urldecode($request->cartlist), true);
        $uuid = (string) Str::uuid();
        $status = "Requested";
        $orders = new orders;
        $orders->uuid = $uuid;
        $orders->user_id = \Auth::user()->id;
        $orders->status = $status;
        $orders->payment_ref = $trans;
        $orders->save();
        $lastInsertedId = $orders->id;
        foreach($decodedCartlist as $item) {
          $product_cost = Product::where('id', $item['prodcut_id'])->pluck('price')->first();
          $products = new orderproducts;
          $products->order_uuid = $uuid;
          $products->order_id =  $lastInsertedId;
          $products->products = $item['prodcut_id'];
          $products->quantity = $item['quantity'];
          $products->price = $product_cost;
          $products->save();
          $deductamount = $deductamount + ( $item['quantity'] * $product_cost);
        }
          $deductamountinfo = \DB::table('wallet_balance')->where('franchise_id', \Auth::user()->id)
            ->decrement('amount', $deductamount);
            
            
             
         $transicationdetails = new transactiondetails;
       $transicationdetails->user_id = \Auth::user()->id;
       $transicationdetails->payment_ref = $trans;
       $transicationdetails->text = 'Product Order Request';
       $transicationdetails->amount = $deductamount;
       $transicationdetails->is_positive = 'NO';
       $transicationdetails->save();
       
        \DB::table('cart')->where('user_id', \Auth::user()->id)->delete();
        
        if($orders){
            return redirect()->back()->with('message', 'products purchased Successfully');
        }else{
            return redirect()->back()->with('message', 'Something went wrong');
        }

        


    }
    public function deletefromcart($id)
    {
       $deletecart = \DB::table('cart')->where('id',$id)->delete();
       return redirect()->back()->with('message', 'Removed from cart');
    }
    
     public function orderedProduct(){
         if(\Auth::user()->role == 2){
             $orders = orders::with('products','products.productsdetails','userdata','franchise')->where('user_id', \Auth::user()->id)->latest('id')->get();
         }elseif(\Auth::user()->role == 1){
            $orders = orders::with('products','products.productsdetails','userdata','franchise')->latest('id')->get();
        }
        // dd($orders);
    
        return view('admin/orderedetails',compact('orders'));



    }
    public function orderedetailsview($id){

        $orders = orders::with('products','products.productsdetails','userdata')
        ->where('id', $id)
        ->get();
        //  dd($orders);
        return view('admin/orderdetailsview',compact('orders','id'));

    }
    public function changeorderstatus(Request $request){

        $changeorderstatus = orders::where('id', $request->orderid)->update([
            'status'=>$request->status,
            'updated_at'=>Carbon::now()

        ]);
        if($changeorderstatus){
            return redirect()->back()->with('message', 'Updated Successfully');
        }else{
            return redirect()->back()->with('message', 'Something went wrong');
        }

    }
      public function addwalletamount(){
            $franchiselist = User::where('role',2)->get();
            return view('admin/addwalletamount',compact('franchiselist'));
    }
    public function listofwalletamount(){

        $walletlists = addwallet::with('boydetails','franchisedeatails','created_users')->get();
        // echo "<pre>";
        // print_r($walletlists);
        // exit;
        // dd($walletlists);
        return view('admin/listofwalletamount',compact('walletlists'));
    }
    public function addamountwallet(Request $request){
        if(\Auth::user()->role==1){
            
            $uniqueid = uniqid();
        DB::beginTransaction();
        try{
            $sql = new addwallet;
            $sql->amount = $request->amount;
            $sql->reference = $request->reference;
            $sql->franchiseid = $request->franchise;
            $sql->cashtype = $request->cashtype;
            $sql->payment_ref = $uniqueid;
            $sql->created_user = \Auth::user()->id;
            $sql->save();
            
            // Check if the record exists
            $walletRecord = DB::table('wallet_balance')
                            ->where('franchise_id', $request->franchise)
                            ->first();
            
            if ($walletRecord) {
                // Record exists, increment the amount
                DB::table('wallet_balance')
                    ->where('franchise_id', $request->franchise)
                    ->increment('amount', $request->amount);
            } else {
                // Record does not exist, insert a new record
                DB::table('wallet_balance')->insert([
                    'franchise_id' => $request->franchise,
                    'amount' => $request->amount,
                ]);
            }


            //$updatewallet = DB::table('wallet_balance')->where('franchise_id',$request->franchise)->increment('amount', $request->amount);
            $ispositive ='YES';
            
            $text = 'transaction added successfully';
            $type = "wallet recharge by admin";
            $id =$request->franchise;
            $transaction = $this->savetransactionTrait($text,$id,$sql->amount,$ispositive, $uniqueid, $type);
             DB::commit();
            // if($transaction){
            return redirect()->back()->with('message', 'Updated Successfully');
            // }else{
            //     return redirect()->back()->with('message', 'Something went wrong');
            // } 
        }catch (\Exception $e) {
            //dd($e);
                DB::rollback();
                  return redirect()->back()->with('message', 'Something went wrong');
            }
       
        }



    }
    
}
