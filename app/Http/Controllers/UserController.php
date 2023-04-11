<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUser;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Function của Adminpage
    public function showListUser()
    {
        return view('Admin.UserProfile.user_list', ['ListUser' => User::orderBy('id', 'desc')->paginate(5)]);
    }

    public function showDetailUser($id)
    {
        $listAdmin = Admin::all();
        $UserDuocChon = User::find($id);
        return view('Admin.UserProfile.user_detail', compact('UserDuocChon', 'listAdmin'));
    }


    public function doiTrangThaiUser($id, $note)
    {
        $UserDuocChon = User::find($id);
        $ktUser = $UserDuocChon['isBan'];
        if ($ktUser == 0) {
            $UserDuocChon['isBan'] = 1;
        } else {
            $UserDuocChon['isBan'] = 0;
        }
        $UserDuocChon['admin_id'] = Auth::guard('admin')->user()->id;
        $thoiGianUpdate = Carbon::now()->toDateTimeString();
        if ($UserDuocChon['isBan'] == 1) {
            $UserDuocChon['note'] = $UserDuocChon['note'] . ' ' . $thoiGianUpdate . ' : Tài khoản đã bị khóa bởi ' . Auth::guard('admin')->user()->name . ' vì ' . $note . '.';
        } elseif ($UserDuocChon['isBan'] == 0) {
            $UserDuocChon['note'] = $UserDuocChon['note'] . ' ' . $thoiGianUpdate . ' : Tài khoản đã bị mở khóa bởi ' . Auth::guard('admin')->user()->name . ' vì ' . $note . '.';
        }
        $UserDuocChon->save();


        return response()->json(['status' => 'Trạng thái của người dùng đã được thay đổi']);
    }

    public function xoaNoteUser($id)
    {

        $UserDuocChon = User::find($id);
        $UserDuocChon['admin_id'] = Auth::guard('admin')->user()->id;
        $thoiGianUpdate = Carbon::now()->toDateTimeString();
        $UserDuocChon['note'] = $thoiGianUpdate . ': Các ghi chú cũ đã được xóa bởi ' . Auth::guard('admin')->user()->name . '.';
        $UserDuocChon->save();


        return response()->json(['status' => 'Trạng thái của người dùng đã được thay đổi']);
    }


    //Function của Userpage
    public function luuUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
            'address' => 'required',

        ], [
            'name.required' => 'Tên đăng nhập không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'email.exists' => 'Email này không tồn tại',
            'password.required' => 'Password không được để trống',
            'cpassword.required' => 'Hãy nhập lại password',
            'cpassword.same' => 'Xác nhận password không giống nhau',
            'address.required' => 'Địa chỉ không được để trống',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        // $user->isBan = 0;
        $user->note = "";
        $save = $user->save();

        if ($save) {
            return redirect()->back()->with('success', 'Bạn đã đăng ký thành công ! Hãy thử đăng nhập nhé !');
        } else {
            return redirect()->back()->with('register-error', 'Đăng ký thất bại ! Xin hãy xem lại thông tin đăng ký của bạn !');
        }
    }

    public function xacNhanUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30',
        ], [
            'email.exists' => 'Email này không tồn tại !',
            'password.required' => 'Hãy nhập Password để đăng nhập !',
        ]);

        $infos = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($infos)) {
            return redirect()->route('user.showListSanPhamHome');
        } else {
            return redirect()->route('user.login')->with('error', 'Đăng nhập không thành công !');
        }
    }

    public function dangXuatUser()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.showListSanPhamHome');
    }

    public function filterNguoiDung(Request $request)
    {
        $result = User::query();

        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $isBan = $request->input('isBan');

        // dd($name, $phone, $email, $isBan);

        $result->when($name, function ($query, $name) {
            $query->where('name',  'LIKE', '%' . $name . '%');
        });

        $result->when($email, function ($query, $email) {
            $query->where('email',  'LIKE', '%' . $email . '%');
        });

        $result->when($phone, function ($query, $phone) {
            $query->where('phone',  $phone);
        });

        $result->when($isBan == 0, function ($query) {
            $query->where('isBan',  0);
        });

        $result->when($isBan == 1, function ($query) {
            $query->where('isBan',  1);
        });

        $ListUser = $result->orderBy('id', 'desc')->paginate(5);

        return view('Admin.UserProfile.user_filter_list', compact('ListUser'));
    }
}
