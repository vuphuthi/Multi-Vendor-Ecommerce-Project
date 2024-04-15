<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Carbon\Carbon;
class ShippingAreaController extends Controller
{
    public function AllDivision(){
        $division = ShipDivision::latest()->get();
        return view('backend.ship.division.division_all',compact('division'));
    }

    public function AddDivision(){
        return view('backend.ship.division.division_add');
    }

    public function StoreDivision(Request $request){

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Khu vực đã thêm thành công',
            'alert-type' => 'success'  
        );
        return redirect()->route('all.division')->with($notification);
    }
    public function EditDivision($id){
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.division_edit',compact('division'));
    }

    public function UpdateDivision(Request $request){
        $id = $request->id;
        $division = ShipDivision::findOrFail($id);
        $division->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now()
        ]);
        $notification =  ([
            'message' => 'Khu vực đã cập nhật thành công',
            'alert-type' => 'success' 
        ]);
        return redirect()->route('all.division')->with($notification);
    }

    public function DivisionRemove($id){
        ShipDivision::findOrFail($id)->delete();
        $notification =  ([
            'message' => 'Xóa thành công',
            'alert-type' => 'success' 
        ]);

        return redirect()->back()->with($notification);
    }
    public function AllDistrict(){
        $district = ShipDistricts::latest()->get();
        return view('backend.ship.district.district_all',compact('district'));
    }
    public function AddDistrict(){
        $district = ShipDivision::latest()->get();
        return view('backend.ship.district.district_add',compact('district'));
    }
    public function StoreDistrict(Request $request){
        ShipDistricts::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now()
        ]);
        $notification = ([
            'message' => 'Thêm Quận huyền thành công',
            'alert-type' => 'success',
        ]);

        return redirect()->route('all.district')->with($notification);         
    }
}
