<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateDanhMuc;
use App\Http\Requests\ValidateDanhMucCon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\DanhMuc;
use App\Models\DanhMucCon;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class DanhMucController extends Controller
{

    //Function của Adminpage
    public function showListDanhMuc()
    {
        // return view('Admin.Category.category_list', ['ListDanhMuc' => DanhMuc::all()]);
        return view('Admin.Category.category_list', ['ListDanhMuc' => DanhMuc::orderBy('id', 'desc')->paginate(5)]);
    }

    public function showListDanhMucCha()
    {
        $danhMucCha = DB::table('danh_mucs')->select('TenDanhMuc')->distinct()->get();
        return view('Admin.Category.sub_category_add', ['ListDanhMucCha' => $danhMucCha]);
    }
    public function showDetailDanhMuc($id)
    {
        $listDanhMucCha = DB::table('danh_mucs')->select('TenDanhMuc')->distinct()->get();
        $DanhMucDuocChon = DanhMuc::find($id);
        $listAdmin = Admin::all();
        return view('Admin.Category.category_edit', compact('listDanhMucCha', 'listAdmin', 'DanhMucDuocChon'));
    }
    public function showFormSearchDanhMuc()
    {
        $listDanhMucCha = DB::table('danh_mucs')->select('TenDanhMuc')->distinct()->get();
        return view('Admin.Category.category_search', compact('listDanhMucCha'));
    }
    public function chinhSuaDanhMuc(ValidateDanhMuc $request, $id)
    {

        $DanhMucDuocChon = DanhMuc::find($id);
        $ThongtinUpdate = $request->validated();
        $DanhMucDuocChon['admin_id'] = Auth::guard('admin')->user()->id;
        $DanhMucDuocChon->fill($ThongtinUpdate);

        $DanhMucDuocChon->save();

        return redirect()->route('showListDanhMuc')->with('success', 'Thông tin danh mục đã được cập nhật !');
    }

    public function luuDanhMuc(ValidateDanhMuc $request)
    {
        $data = $request->validated();
        $data['admin_id'] = Auth::guard('admin')->user()->id;
        $newDanhMuc = DanhMuc::create($data);

        // return redirect('/category/list');
        return back()->with('success', 'Danh Mục đã được thêm thành công !');
    }

    public function xoaDanhMuc($id)
    {
        
        $DanhMucDuocChon = DanhMuc::find($id);
        if (!$DanhMucDuocChon) return back()->with('error', 'Không tìm thấy danh mục !');
        if (SanPham::where('danh_muc_id', '=', $id)->exists()){
            return response()->json(['cancel' => 'Danh mục đang có sản phẩm !']);
        }
        $DanhMucDuocChon->delete();

        // return redirect('/category/list');
        return response()->json(['success' => 'Danh mục đã bị xóa !']);
    }
    public function filterDanhMuc(Request $request)
    {
        $listDanhMucCha = DB::table('danh_mucs')->select('TenDanhMuc')->distinct()->get();


        $result = DanhMuc::query();

        $TenDanhMuc = $request->input('TenDanhMuc');
        $TenDanhMucCon = $request->input('TenDanhMucCon');
        // dd($TenDanhMuc, $tenDanhMucCon);

        $result->when($TenDanhMuc, function ($query, $TenDanhMuc) {
            $query->where('TenDanhMuc', $TenDanhMuc);
        });

        $result->when($TenDanhMucCon, function ($query, $TenDanhMucCon) {
            $query->where('TenDanhMucCon',  'LIKE', '%' . $TenDanhMucCon . '%');
        });

        $ListDanhMuc = $result->orderBy('id', 'desc')->paginate(5);

        return view('Admin.Category.category_filter_list', compact('ListDanhMuc', 'listDanhMucCha'));
    }

    //Function của Userpage


    public function showListDanhMucUser()
    {

        return view('User.home', ['listDanhMuc' => DanhMuc::all()]);
    }
    public function showListSanPhamTheoDanhMuc($id)
    {

        $listDanhMuc = DanhMuc::where('id', $id)->first();
        $listSanPham = SanPham::where('danh_muc_id', $listDanhMuc->id)->where('TinhTrang', '1')->get();
        return view('User.Sanpham.sanphamtheodanhmuc', compact('listSanPham'));
    }
}
