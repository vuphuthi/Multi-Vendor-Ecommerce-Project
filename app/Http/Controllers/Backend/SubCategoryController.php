<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Image;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
    public function AllSubCategory(){
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_all',compact('subcategories'));
    }
    public function AddSubCategory(){
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('backend.subcategory.subcategory_add',compact('categories'));
    }
    public function StoreSubCategory(Request $request){ 

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name), 
        ]);

       $notification = array(
            'message' => 'Danh mục con thêm thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification); 

    }
    public function EditSubCategory($id){
        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit',compact('subcategory','categories'));
    }
    public function UpdateSubCategory(Request $request){
        $subcat_id = $request->id;
        Subcategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_slug)
        ]);
        $notification =  array(
            'message' => 'Danh mục con cập nhật thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification); 
    }
    public function DeleteSubCategory($id){
        Subcategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Xóa danh mục thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }
}
