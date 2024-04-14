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
        $notification = ([
            'message' => 'Khu vực đã thêm thành công',
            'aler-type' => 'success'  
        ]);
        return redirect()->route('all.division')->with($notification);
    }
}
