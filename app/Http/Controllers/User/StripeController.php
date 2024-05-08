<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
class StripeController extends Controller
{
    public function StripeOrder(Request $request){

      if(Session::has('coupon')){
          $total_amount = Session::get('coupon')['total_amount'];
      }else{
          $total_amount = round(Cart::total());
      }      
        
        \Stripe\Stripe::setApiKey('sk_test_51PBgZY2LOrXi5qJFnMnKteXXrkHAoOoI9xtMBs0ki9uSeICJNt45J5niFfOQryTQaZscUg04458L0wk9SeJE0Z9h00WwUvK7ph');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        
        $charge = \Stripe\Charge::create([
          'amount' => $total_amount,
          'currency' => 'vnd',
          'description' => 'Valo shop',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

        $order_id = Order::insertGetId([
          'user_id' => Auth::id(),
          'division_id' => $request->division_id,
          'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => $charge->payment_method,
            'payment_method' => 'Stripe',
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'), 
            'status' => 'pending',
            'created_at' => Carbon::now(),  

      ]);
       // Start Send Email

      $invoice = Order::findOrFail($order_id);

      $data = [

        'invoice_no' => $invoice->invoice_no,
        'amount' => $total_amount,
        'name' => $invoice->name,
        'email' => $invoice->email,

    ];

    Mail::to($request->email)->send(new OrderMail($data));

       // End Send Email
      
      $carts = Cart::content();
        foreach($carts as $cart){

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'vendor_id' => $cart->options->vendor,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' =>Carbon::now(),

            ]);

        } // End Foreach

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Đặt hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification); 



    }// End Method 




    public function CashOrder(Request $request){

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }


        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Thanh toán khi nhận hàng',
            'payment_method' => 'Thanh toán khi nhận hàng',

            'currency' => 'vnd',
            'amount' => $total_amount,


            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'), 
            'status' => 'pending',
            'created_at' => Carbon::now(),  

        ]);

      $carts = Cart::content();
        foreach($carts as $cart){

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'vendor_id' => $cart->options->vendor,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' =>Carbon::now(),

            ]);

        } // End Foreach

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Đặt hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification); 

    }// End Method 
}
