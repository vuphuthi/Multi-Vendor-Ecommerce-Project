<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function UserDashboard(){
        $id = Auth::User()->id;
        $userData = User::find($id);
        return view('index',compact('userData'));
    }
    public function UserDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Đăng xuất thành công',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    }
    public function UserProfileStore(Request $request){
        $id = Auth::User()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Hồ sơ của bạn được cập nhật thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function UserUpdatePassword(Request $request){
        // validate
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ], [
            'old_password.required' => 'Vui lòng nhập mật khẩu cũ.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.confirmed' => 'Mật khẩu mới không khớp với xác nhận mật khẩu.',
            'new_password_confirmation.required' => 'Vui lòng xác nhận lại mật khẩu mới.',

        ]);

        if (Hash::check($request->old_password, auth::user()->password)) {

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with('status', "Thay đổi mật khẩu thành công");
        }
        
        return back()->with('error', 'Mật khẩu cũ không khớp!');

    }
}
