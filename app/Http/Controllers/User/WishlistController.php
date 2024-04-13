<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Carbon\Carbon;
class WishlistController extends Controller
{
    public function AddToWishList(Request $request, $product_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                
                return response()->json(['success' => 'Đã thêm thành công vào danh sách yêu thích của bạn']);
                
            }else{
                
                return response()->json(['error' => 'Sản phẩm này đã có trong danh sách yêu thích của bạn']);
            }

        }
        else{
            return response()->json(['error' => 'Cần đăng nhập để sử dụng tính năng này' ]);
        }
    }
}
