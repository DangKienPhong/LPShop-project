<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateLienHe;
use App\Models\Admin;
use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LienHeController extends Controller
{
    //
    public function luuLienHe(ValidateLienHe $request)
    {
        $thongtin = $request->validated();
        $thongtin['TinhTrang'] = 0;
        $newMessage = LienHe::create($thongtin);
        if ($newMessage) {
            return back()->with('success', 'Thông tin và tin nhắn của bạn đã gửi !');
        }
        return back()->with('fail', 'Đã xảy ra lỗi khi gửi thông tin');
    }

    public function showListLienHe()
    {
        $listLienHe = LienHe::orderBy('id', 'desc')->paginate(5);
        return view('Admin.Contact.Contact_list', compact('listLienHe'));
    }

    public function showDetailLienHe($id)
    {
        $LienHe = LienHe::find($id);
        $listAdmin = Admin::all();
        return view('Admin.Contact.Contact_details', compact('LienHe', 'listAdmin'));
    }

    public function doiTrangThaiLienHe($id)
    {

        $LienHeDuocChon = LienHe::find($id);
        $LienHeDuocChon['TinhTrang'] = 1;
        $LienHeDuocChon['admin_id'] = Auth::guard('admin')->user()->id;
        $LienHeDuocChon->save();

        return redirect()->route('showListLienHe')->with('success', 'Tin nhắn liên hệ đã được đánh dấu đã xem !');
    }

    public function filterLienHe(Request $request)
    {
        $result = LienHe::query();

        $TieuDe = $request->input('TieuDe');
        $TenCongTy = $request->input('TenCongTy');
        $Email = $request->input('Email');
        $TenNguoiGui = $request->input('TenNguoiGui');
        $TinhTrang = $request->input('TinhTrang');
        // dd($TieuDe, $TenCongTy);

        $result->when($TieuDe, function ($query, $TieuDe) {
            $query->where('TieuDe',  'LIKE', '%' . $TieuDe . '%');
        });

        $result->when($Email, function ($query, $Email) {
            $query->where('Email',  'LIKE', '%' . $Email . '%');
        });

        $result->when($TenCongTy, function ($query, $TenCongTy) {
            $query->where('TenCongTy', 'LIKE', '%' . $TenCongTy . '%');
        });

        $result->when($TenNguoiGui, function ($query, $TenNguoiGui) {
            $query->where('TenNguoiGui', 'LIKE', '%' . $TenNguoiGui . '%');
        });

        $result->when($TinhTrang == 0, function ($query) {
            $query->where('TinhTrang', 0);
        });

        $result->when($TinhTrang == 1, function ($query) {
            $query->where('TinhTrang', 1);
        });

        $listLienHe = $result->orderBy('id', 'desc')->paginate(5);

        return view('Admin.Contact.Contact_filter_list', compact('listLienHe'));
    }

    public function xoaLienHe($id)
    {


        $LienHeDuocChon = LienHe::find($id);
        if (!$LienHeDuocChon) return back()->with('error', 'Không tìm thấy nhà cung cấp !');
        if ($LienHeDuocChon->TinhTrang == 0){
            return response()->json(['cancel' => 'Tin nhắn liên hệ vẫn chưa được đánh dấu đã xem !']);
        }
        $LienHeDuocChon->delete(); 

        // return redirect('/category/list');
        return response()->json(['success' => 'Tin nhắn liên hệ được chọn đã bị xóa']);
    }
}
