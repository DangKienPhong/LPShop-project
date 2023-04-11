<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateNhaCungCap;
use App\Models\Admin;
use App\Models\NhaCungCap;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NhaCungCapController extends Controller
{
    //
    public function showListNhaCungCap()
    {
        return view('Admin.Supplier.Supplier_list', ['ListNhaCungCap' => NhaCungCap::orderBy('id', 'desc')->paginate(5)]);
    }

    public function showDetailNhaCungCap($id)
    {
        $listAdmin = Admin::all();
        $NhaCungCapDuocChon = NhaCungCap::find($id);
        return view('Admin.Supplier.Supplier_edit', compact('listAdmin', 'NhaCungCapDuocChon'));
    }

    public function chinhSuaNhaCungCap(ValidateNhaCungCap $request, $id)
    {

        $NhaCungCapDuocChon = NhaCungCap::find($id);
        $ThongtinUpdate = $request->validated();
        $NhaCungCapDuocChon['admin_id'] = Auth::guard('admin')->user()->id;
        $NhaCungCapDuocChon->fill($ThongtinUpdate);

        $NhaCungCapDuocChon->save();
        return redirect()->route('showListNhaCungCap')->with('success', 'Thông tin của nhà cung cấp đã được cập nhật !');
    }

    public function luuNhaCungCap(ValidateNhaCungCap $request)
    {


        $data = $request->validated();
        $data['admin_id'] = Auth::guard('admin')->user()->id;
        $newNhaCungCap = NhaCungCap::create($data);

        return back()->with('success', 'Thông tin của nhà cung cấp đã được thêm thành công !');
    }

    public function xoaNhaCungCap($id)
    {



        $NhaCungCapDuocChon = NhaCungCap::find($id);
        if (!$NhaCungCapDuocChon) return back()->with('error', 'Không tìm thấy nhà cung cấp !');
        if (SanPham::where('nha_cung_cap_id', '=', $id)->exists()){
            return response()->json(['cancel' => 'Đang có sản phẩm đang được cung cấp bởi nhà cung cấp này !']);
        }
        $NhaCungCapDuocChon->delete();

        return response()->json(['success' => 'Thông tin của nhà cung cấp được chọn đã bị xóa']);
    }

    public function showFormSearchNhaCungCap()
    {
        return view('Admin.Supplier.Supplier_search');
    }

    public function filterNhaCungCap(Request $request)
    {
        $result = NhaCungCap::query();

        $TenNhaCungCap = $request->input('TenNhaCungCap');
        $SoDienThoai = $request->input('SoDienThoai');
        $Email = $request->input('Email');
        // dd($TenNhaCungCap, $SoDienThoai);

        $result->when($TenNhaCungCap, function ($query, $TenNhaCungCap) {
            $query->where('TenNhaCungCap',  'LIKE', '%' . $TenNhaCungCap . '%');
        });

        $result->when($Email, function ($query, $Email) {
            $query->where('Email',  'LIKE', '%' . $Email . '%');
        });

        $result->when($SoDienThoai, function ($query, $SoDienThoai) {
            $query->where('SoDienThoai',  $SoDienThoai);
        });

        $ListNhaCungCap = $result->orderBy('id', 'desc')->paginate(5);

        return view('Admin.Supplier.Supplier_filter_list', compact('ListNhaCungCap'));
    }
}
