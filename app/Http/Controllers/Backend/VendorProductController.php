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
    public function VendorGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcat);

    }
    public function VendorStoreProduct(Request $request){
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;
        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp, 

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals, 

            'product_thambnail' => $save_url,
            'vendor_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(), 

        ]);

        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;

        MultiImg::insert([

            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(), 

        ]); 
        } // end foreach

        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'Thêm sản phẩm thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('vendor.all.product')->with($notification); 
    }
    public function VendorEditProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $brands = Brand::latest()->get();
        $Subcategory = Subcategory::latest()->get();
        $categories = Category::latest()->get();
        $products = Product::findOrFail($id);
        return view('vendor.backend.product.product_edit_vendor',compact('brands','categories','products','Subcategory','multiImgs'));
    }
    public function VendorUpdateProduct(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp, 

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals, 

            'status' => 1,
            'created_at' => Carbon::now(), 

        ]);
        $notification = array(
            'message' => 'Sửa sản phẩm thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('vendor.all.product')->with($notification); 
    }
    public function VendorUpdateProductThambnail(Request $request){
        $product_id = $request->id;
        $Image_Old = $request->old_img;
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        if (file_exists($Image_Old)) {
            unlink($Image_Old);
         }
         Product::findOrFail($product_id)->update([
            'product_thambnail' => $save_url,
            // 'updated_at'         => Carbon::now(),
         ]);
         $notification = array(
            'message' => 'Sửa ảnh thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }
    public function VendorUpdateProductMultiimage(Request $request){

        $imgs = $request->multi_img;

        foreach($imgs as $id => $img ){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;

        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),

        ]); 
        } // end foreach

         $notification = array(
            'message' => 'Đã cập nhật nhiều hình ảnh sản phẩm thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }
    public function VendorMulitImageDelelte($id){
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Đã xóa nhiều hình ảnh sản phẩm thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
