<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Product;
use App\Models\RegUser;
use Session;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway -> setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway -> setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway -> setTestMode(true);
    }

    public function pay(Request $request,$id){
        try{
            $response = $this->gateway->purchase(array(
                'amount'=>$request->amount,
                'currency'=>env('PAYPAL_CURRENCY'),
                'returnUrl'=>url('success'),
                'cancelUrl'=>url('error')
            ))->send();
            Session::put('product_id', $id);

            if($response->isRedirect()){
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }
        }
        catch (\Throwable $th){
         
                return $th->getMessage();
        }
    }

    public function success(Request $request){
          $product_id = Session::get('product_id');
         
        if($request->input('paymentId') && $request->input('PayerID')){
            $transaction = $this->gateway->completePurchase(array(
                'payerId'=>$request->input('PayerID'),
                'transactionReference'=>$request->input('paymentId')
            ));
            $response = $transaction->send();
            if($response->isSuccessful()){
                $arr = $response->getData();   
                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->save();

                $user = Session::get('email');
                $user_detail= RegUser::where('email',$user)->first();
                $product_detail = Product::find($product_id);
                // dd($product_detail);
                $order = new Order();
                $order->user_id = $user_detail->id;
                $order->product_id = $product_id;
                $order->transation_id =  $arr['id'];
                $order->amount = intval($product_detail->price);
                $order->pay_status = $arr['state'];
               
                $order->save();
                session()->forget('product_id');    

                // return "Payment is Successfull. Your Transaction Id is :" .$arr['id'];
                   return redirect('/');


            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return "Payment Declined!! ";

        }
    }

    public function error(){
        return 'User declined the Payment ! ';
    }
}
