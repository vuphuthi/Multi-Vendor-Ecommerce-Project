<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompareController extends Controller
{
    public function AddToCompare(Request $request, $product_id){
        if(Auth::check()){
            $exists = Compare::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if(!$exists){
                Compare::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                
                return response()->json(['success' => 'Đã thêm thành công vào phần so sánh của bạn']);
                
            }else{
                
                return response()->json(['error' => 'Sản phẩm này đã có trong danh sách so sánh của bạn']);
            }

        }
        else{
            return response()->json(['error' => 'Cần đăng nhập để sử dụng tính năng này' ]);
        }
    }
    public function AllCompare(){
        return view('frontend.compare.view_compare');
    }
    
    public function GetCompareProduct(){
        $compare = Compare::with('product')->where('user_id',Auth::id())->latest()->get();

        $compareQty = Compare::count();

        $baseUrl = url('/product/details');

        foreach ($compare as $com) {
            $com->product->product_link = $baseUrl . '/' . $com->product->id . '/' . $com->product->product_slug;
        }
        return response()->json(['compare' => $compare, 'compareQty' => $compareQty]);

    }
    public function CompareRemove($id){
        Compare::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Xóa sản phẩm thành công' ]); 
    }

}
