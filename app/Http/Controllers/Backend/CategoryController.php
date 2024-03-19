<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function AllCategory(){
        $categories = Category::latest()->get();
        return view('backend.category.category_all',compact('categories'));
    }
    public function AddCategory(){
        $categories = Category::latest()->get();
        return view('backend.category.category_add');
    }
    public function StoreCategory(Request $request){

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;
    
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name), // Sử dụng hàm Str::slug để tạo slug từ tên thương hiệu
            'category_image' => $save_url, 
        ]);
    
       $notification = array(
            'message' => 'Thêm thành công',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.category')->with($notification); 
    
    }
    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }
    public function UpdateCategory(Request $request){
        $category_id = $request->id;
        $old_img = $request->old_img;
        if($request->file('category_image')){
            $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;
            
        if (file_exists($old_img)) {
            unlink($old_img);
         }
        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name), // Sử dụng hàm Str::slug để tạo slug từ tên thương hiệu
            'category_image' => $save_url, 
        ]);
    
       $notification = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.category')->with($notification); 
        }
        else{
            Category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name), // Sử dụng hàm Str::slug để tạo slug từ tên thương hiệu
            ]);
        
           $notification = array(
                'message' => 'Cập nhật không có hình ảnh thành công',
                'alert-type' => 'success'
            );
        
            return redirect()->route('all.category')->with($notification); 
        }
    }
    public function DeleteCategory($id){
        $category = Category::findOrFail($id);
        $img = $category->category_image;
        unlink($img);
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa thành công',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification); 
    }
}
