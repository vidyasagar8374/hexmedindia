<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
//use Stripe;
use App\Models\Payment;
use App\Models\Wallet;
use App\Models\User;
use \Stripe\Stripe;
use App\Models\transactiondetails;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;


class StripePaymentController extends Controller
{
    public function stripe()
    {
        dd('work in progress please contact admin 111');
        
        return view('stripe');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripePost(Request $request)
    // {
    //     $user = \Auth::user()->id;
    //     $time = \Carbon\Carbon::now()->timestamp;
    //     $rand = rand();
    //     $amount = $request->wallet;
    //     $api = new Api(config('razorpay.key'), config('razorpay.secret'));

    //     $order = $api->order->create([
    //         'receipt'         => 'order_rcptid_11',
    //         'amount'          => $amount * 100,
    //         'currency'        => 'INR',
    //         'payment_capture' => 1
    //     ]);
       
        
    // //       $stripe = new \Stripe\StripeClient('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');
    // //     // $stripe = new \Stripe\StripeClient('sk_test_51O9lonSIZxXCO0fi3jmSjf9SlU5hEGbzIr2m5riL8QRW3jo2TddGnGFVlylx0pcSLXebTGxo3LJJu1TiNXvf2q3R00NeK94MUU');
    // //    // dd($stripe->checkout);
    // //  $identify = $user . '-' . $time . '-' . $rand;
    // //     $checkout_session = $stripe->checkout->sessions->create([
    // //         'line_items' => [[
    // //         'price_data' => [
    // //             'currency' => 'inr',
    // //             'product_data' => [
    // //                 'name' => \Auth::user()->id . ':' . \Carbon\Carbon::now(),
    // //             ],
    // //             'unit_amount' =>  $amount * 100,
    // //         ],
    // //         'quantity' => 1,
    // //         ]],
    // //         'mode' => 'payment',
    // //         'success_url' => url('/franchise/transactionsuccess?data=' . encrypt($identify)),
    // //         'cancel_url' =>  url('/franchise/cancel?data=' . encrypt($identify)),

    // //     ]);
    //     // $infodetails = json_decode($order, true);
    //     $payment = new Payment;
    //     $payment->payment = $amount;
    //     $payment->live_id = $order->id;
    //     $payment->currency = $order->currency;
    //     $payment->trans_id = $order->id;
    //     $payment->info = 'NA';
    //     $payment->identify = 'na';
    //     $payment->payment_status = $order->status;
    //     $payment->logged_user_id = \Auth::user()->id;
    //     $payment->is_success = 0;
    //     $payment->rand = $rand;
    //     $payment->status = 'pending';
    //     $payment->save();
    //     // dd($order);
    //     return view('payment', ['order' => $order]);

    //     return Redirect::to($checkout_session->url);
    // }
    
    public function stripePost(Request $request)
    {
        // dd('work in progress please contact admin');
        $user = \Auth::user()->id;
        $time = \Carbon\Carbon::now()->timestamp;
        $rand = rand();
        $amount = $request->wallet;
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));

        $order = $api->order->create([
            'receipt'         => 'order_rcptid_11',
            'amount'          => $amount * 100,
            'currency'        => 'INR',
            'payment_capture' => 1
        ]);
       
        
    //       $stripe = new \Stripe\StripeClient('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');
    //     // $stripe = new \Stripe\StripeClient('sk_test_51O9lonSIZxXCO0fi3jmSjf9SlU5hEGbzIr2m5riL8QRW3jo2TddGnGFVlylx0pcSLXebTGxo3LJJu1TiNXvf2q3R00NeK94MUU');
    //    // dd($stripe->checkout);
    //  $identify = $user . '-' . $time . '-' . $rand;
    //     $checkout_session = $stripe->checkout->sessions->create([
    //         'line_items' => [[
    //         'price_data' => [
    //             'currency' => 'inr',
    //             'product_data' => [
    //                 'name' => \Auth::user()->id . ':' . \Carbon\Carbon::now(),
    //             ],
    //             'unit_amount' =>  $amount * 100,
    //         ],
    //         'quantity' => 1,
    //         ]],
    //         'mode' => 'payment',
    //         'success_url' => url('/franchise/transactionsuccess?data=' . encrypt($identify)),
    //         'cancel_url' =>  url('/franchise/cancel?data=' . encrypt($identify)),

    //     ]);
        // $infodetails = json_decode($order, true);
        $payment = new Payment;
        $payment->payment = $amount;
        $payment->live_id = $order->id;
        $payment->currency = $order->currency;
        $payment->trans_id = $order->id;
        $payment->info = 'NA';
        $payment->identify = 'na';
        $payment->payment_status = $order->status;
        $payment->logged_user_id = \Auth::user()->id;
        $payment->is_success = 0;
        $payment->rand = $rand;
        $payment->status = 'pending';
        $payment->save();
        // dd($order);
        return view('payment', ['order' => $order]);

        return Redirect::to($checkout_session->url);
    }
    
    public function transactionsuccess(Request $request){
        // dd($request)
        
        $input = $request->all();
        // dd($input);
        Log::channel('payment')->info('Payment processed success', [
            'razorpay_order_id' => $input['razorpay_order_id'],
            'razorpay_payment_id' => $input['razorpay_payment_id'],
            'razorpay_signature' => $input['razorpay_signature'],
            'userid' => 'user_id'
        ]);
        // dd($input);
//         $api = new Api(config('razorpay.key'), config('razorpay.secret'));
//         $signatureStatus = $api->utility->verifyPaymentSignature([
//             'razorpay_order_id' => $input['razorpay_order_id'],
//             'razorpay_payment_id' => $input['razorpay_payment_id'],
//             'razorpay_signature' => $input['razorpay_signature']
//         ]);
//         dd($signatureStatus);
// dd( $input['razorpay_signature']);


        // if ($signatureStatus === true) {
        try{
            \DB::beginTransaction();
             $data = Payment::where('live_id', $input['razorpay_order_id'])->update([
                'is_success' => 1,
                'status' => 'success',
                'payment_status' => 'paid',
                'identify' =>  $input['razorpay_payment_id'],
                'info' => $input['razorpay_signature']
            ]);
            $data = Payment::where('live_id', $input['razorpay_order_id'])->first();
            // dd(\Auth::user());
            \Auth::login(User::where('id', $data->logged_user_id)->first());
            
            // dd(\Auth::user()->id);
            Wallet::where('franchise_id', \Auth::user()->id)->increment('amount', $data->payment);
            
            
             $transicationdetails = new transactiondetails;
            $transicationdetails->user_id = \Auth::user()->id;
            $transicationdetails->text = 'Wallet Recharge';
            $transicationdetails->amount = $data->payment;
             $transicationdetails->payment_ref = $input['razorpay_order_id'];
            $transicationdetails->is_positive = 'YES';
            $transicationdetails->save();
            \DB::commit();
            return view('franchise.transactionsuccess');
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                    'something went wrong'
                ]);
        }
           
        // } else {
        //     dd('failed');
        // }

       dd($request->all());
        $id = decrypt($request->data);
      //  dd($id);
        $loggeduser = explode("-",$id);
        if(\Auth::user()->id == $loggeduser[0]){
            $live_id = Payment::where('identify', $id)->pluck('live_id')->first();
              Stripe::setApiKey('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');
            //   Stripe::setApiKey('sk_test_51O9lonSIZxXCO0fi3jmSjf9SlU5hEGbzIr2m5riL8QRW3jo2TddGnGFVlylx0pcSLXebTGxo3LJJu1TiNXvf2q3R00NeK94MUU');
              
            //   sk_test_51O9lonSIZxXCO0fi3jmSjf9SlU5hEGbzIr2m5riL8QRW3jo2TddGnGFVlylx0pcSLXebTGxo3LJJu1TiNXvf2q3R00NeK94MUU
        $checkoutSession = \Stripe\Checkout\Session::retrieve($live_id);
    //  dd($checkoutSession->payment_intent);
            $data = Payment::where('identify', $id)->update([
                'is_success' => 1,
                'status' => 'success',
                'payment_status' => 'paid'
            ]);
            $data = Payment::where('identify', $id)->first();
            Wallet::where('franchise_id', \Auth::user()->id)->increment('amount', $data->payment);
            
            
             $transicationdetails = new transactiondetails;
            $transicationdetails->user_id = \Auth::user()->id;
            $transicationdetails->text = 'Wallet Recharge';
            $transicationdetails->amount = $data->payment;
             $transicationdetails->payment_ref = $loggeduser[1];
            $transicationdetails->is_positive = 'YES';
            $transicationdetails->save();
            
            
            return view('franchise.transactionsuccess');

        }
    }
    public function webhook(Request $request){
           Log::channel('payment')->info('webhook', [
            'data' => $request->all()
        ]);
    }
}
