<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function VendorDashboard(){
        return view('vendor.index');
    }
    public function VendorLogin(){
        return view('vendor.vendor_login');
    }
}
