<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function luuAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if ($save) {
            return redirect()->back()->with('success', 'Bạn đã đăng ký thành công');
        } else {
            return redirect()->back()->with('error', 'Đăng ký thất bại');
        }
    }

    public function xacNhanAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30',
        ], [
            'email.exists' => 'Email này không tồn tại',
        ]);

        $infos = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($infos)) {
            return redirect()->route('admin.showListSanPham');
        } else {
            return back()->with('error', 'Đăng nhập không thành công');
        }
    }

    public function doiPassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:5|max:30',
            'comfirmed_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'Xin hãy nhập password cũ !',
            'new_password.required' => 'Xin hãy nhập password mới !',
            'new_password.min' => 'Password mới phải ít nhất 5 ký tự!',
            'new_password.max' => 'Password mới không được nhiều hơn 30 ký tự!',
            'comfirmed_password.same' => 'Password không trùng khớp !',
            'comfirmed_password.required' => 'Xin hãy nhập password mới lại !',
        ]);

        $current_admin = Auth::guard('admin')->user();

        if(Hash::check($request->old_password, $current_admin->password)){
            
            Admin::whereId($current_admin->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return back()->with('success', 'Đã thay đổi password thành công !');
        } else {
            return back()->with('error', 'Mật khẩu cũ sai !');
        }
    }


    public function dangXuatAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
