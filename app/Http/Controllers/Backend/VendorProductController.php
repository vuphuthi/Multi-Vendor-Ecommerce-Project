<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class VendorProductController extends Controller
{
    public function VendorAllProduct(){
        $id = Auth::user()->id;
        $products = Product::where('vendor_id',$id)->latest()->get();
        return view('vendor.backend.product.product_all_vendor',compact('products'));
    }
    public function VendorAddProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('vendor.backend.product.product_add_vendor',compact('brands','categories'));
    }
}
