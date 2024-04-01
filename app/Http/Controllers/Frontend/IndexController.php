<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;

class IndexController extends Controller
{
    public function Index(){

    $skip_category_0 = Category::first();
    $skip_product_0 = Product::where('status',1)-> where('category_id',$skip_category_0->id)->orderBy('id','DESC')->limit(5)->get();

    $skip_category_4 = Category::skip(4)->first();
    $skip_product_4 = Product::where('status',1)-> where('category_id',$skip_category_4->id)->orderBy('id','DESC')->limit(5)->get();
    
    $skip_category_2 = Category::skip(2)->first();
    $skip_product_2 = Product::where('status',1)-> where('category_id',$skip_category_2->id)->orderBy('id','DESC')->limit(5)->get();


        $hotdeals = product::where('status',1)->where('hot_deals',1)->where('discount_price','!=',NULL)->limit(3)->orderBy('id','DESC')->get();
        $special_offer = product::where('status',1)->where('special_offer',1)->where('discount_price','!=',NULL)->limit(3)->orderBy('id','DESC')->get();
        $new = Product::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $special_deals = product::where('status',1)->where('special_deals',1)->where('discount_price','!=',NULL)->limit(3)->orderBy('id','DESC')->get();


    return view('frontend.index',compact('skip_category_0','skip_product_0','skip_category_4','skip_product_4','skip_product_2','skip_category_2','hotdeals','special_offer','new','special_deals'));
    
    }
    public function ProductDetails($id, $slug){
        $product = Product::findOrFail($id);

        $color = $product->product_color;
        $product_color = explode(',',$color);

        $size = $product->product_size;
        $product_size = explode(',',$size);

        $multiImage = MultiImg::where('product_id',$product->id)->get();

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();

        return view('frontend.product.product_details',compact('product','product_color','product_size','multiImage','relatedProduct'));
    }
    public function CatWiseProduct(Request $request ,$id,$slug){

        $products = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $breadcat = Category::where('id',$id)->first();
        // $new = Product::where('category_id',$breadcat->id)->orderBy('id','DESC')->limit(3)->get(); // sản phẩm mới theo ID danh mục
        $new = Product::orderBy('id','DESC')->limit(3)->get(); // sản phẩm mới thêm thành công

        return view('frontend.product.category_view',compact('products','categories','breadcat','new'));

    }
    public function SubCatWiseProduct(Request $request, $id, $slug){
        $products = Product::where('subcategory_id',$id)->where('status',1)->get();
        $subcategories = Subcategory::all();
        $breadsubcat = Subcategory::where('id',$id)->first();
        $new = Product::OrderBy('id','DESC')->limit(3)->get();
        // $newSubCat = Product::where('subcategory_id',$breadsubcat->id)->limit(3)->get();

        return view('frontend.product.subcategory_view',compact('products','subcategories','breadsubcat','new'));
    }
    public function ProductViewAjax($id){

        $product = Product::with('category','brand')->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(

         'product' => $product,
         'color' => $product_color,
         'size' => $product_size,

        ));

     }
}
