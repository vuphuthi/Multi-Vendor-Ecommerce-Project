<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\OrderItem;
class AllUserController extends Controller
{
    public function UserAccount(){
        $id = Auth::User()->id;
        $userData = User::find($id);
        return view('frontend.userdashboard.account_details',compact('userData'));    
    }

    public function UserChangePassword(){
        return view('frontend.userdashboard.user_change_password' );
    } 
   
   public function UserOrderPage(){

        $id = Auth::user()->id;
        $orders = Order::where('user_id','=',$id)->orderBy('id','DESC')->get();
        return view('frontend.userdashboard.user_order_page',compact('orders'));

    }
    public function UserOrderDetails($order_id){
        $id = Auth::user()->id;
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',$id)->first();
        $orderItem =  OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.order.order_details',compact('order','orderItem'));
    }
   
   // End Method 


}
