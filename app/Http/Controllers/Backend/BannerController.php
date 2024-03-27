<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;
use Carbon\Carbon;
class BannerController extends Controller
{
    public function AllBanner(){
        $banners = Banner::latest()->get();
        return view('backend.banner.banner_all',compact('banners'));
    }
    public function AddBanner(){
        return view('backend.banner.banner_add');

    }
    public function StoreBanner(Request $request){

        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(2376,807)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url, 
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Banner thêm thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('all.banner')->with($notification); 
    }
}
