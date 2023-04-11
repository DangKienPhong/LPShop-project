<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCapNhatSanPham;
use App\Http\Requests\ValidateThemSanPham;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\ChiTietDonHang;
use App\Models\HinhAnh;
use App\Models\SanPham;
use App\Models\NhaCungCap;
use App\Models\DanhMuc;
use App\Models\DanhMucCon;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Spatie\LaravelIgnition\Support\LivewireComponentParser;
use Spatie\LaravelIgnition\ContextProviders\LaravelLivewireRequestContextProvider;


class SanPhamController extends Controller
{

    public $sorting;
    public function mount()
    {
        $this->sorting = "default";
    }
    public function showFormSanPham()
    {
        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();
        return view('Admin.Product.product_add', compact('listDanhMuc', 'listNhaCungCap'));
    }
    public function showFormSearchSanPham()
    {
        $listSanPham = SanPham::orderBy('id', 'desc')->paginate(5);
        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();
        return view('Admin.Product.product_search', compact('listSanPham', 'listDanhMuc', 'listNhaCungCap'));
    }
    public function showFormSanPhamUser()
    {
        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();
        return view('User.Sanpham.FormTimKiem', compact('listDanhMuc', 'listNhaCungCap'));
    }
    public function showListSanPham()
    {
        // $listSanPham = SanPham::all();
        // $listSanPham = SanPham::orderBy('id', 'desc')->get();
        $listSanPham = SanPham::orderBy('id', 'desc')->paginate(5);
        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();
        return view('Admin.Product.product_list', compact('listSanPham', 'listDanhMuc', 'listNhaCungCap'));
    }

    public function showDetailSanPham($id)
    {
        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();
        $listAdmin = Admin::all();
        $SanPhamDuocChon = SanPham::find($id);
        $listThietBi = array();
        $listThietBi = explode(',', $SanPhamDuocChon->ThietBiBaoGom);
        // $cacHinhAnh = $SanPhamDuocChon->images;
        return view('Admin.Product.product_details', compact('listDanhMuc', 'listAdmin', 'listNhaCungCap', 'listThietBi', 'SanPhamDuocChon'));
    }

    public function getSanPham($id)
    {

        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();
        $SanPhamDuocChon = SanPham::find($id);
        $listThietBi = array();
        $listThietBi = explode(',', $SanPhamDuocChon->ThietBiBaoGom);
        // $cacHinhAnh = $SanPhamDuocChon->images;
        return view('Admin.Product.product_edit', compact('listDanhMuc', 'listNhaCungCap', 'listThietBi', 'SanPhamDuocChon'));
    }


    //Làm sạch tên sản phẩm trước khi gán vào tên hình ảnh
    function slug($z)
    {
        $z = strtolower($z);
        $z = preg_replace('/[^a-z0-9 -]+/', '', $z);
        $z = str_replace(' ', '-', $z);
        return trim($z, '-');
    }

    // Function lưu Sản Phẩm chỉ một hình ảnh
    public function luuSanPham(ValidateThemSanPham $request)
    {
        $data = $request->validated();
        $listThietBi = implode(',', $request->input('ThietBiBaoGom'));
        $data['ThietBiBaoGom'] = $listThietBi;


        if ($request->has('tenhinhanh')) {
            $hinhanh = $request->tenhinhanh;
            $tenSanPham = SanPhamController::slug($data['TenSanPham']);
            $tenhinhanh = $tenSanPham . '-image-' . time() . '.' . $hinhanh->extension();
            $hinhanh->move(public_path('product_images'), $tenhinhanh);
            $data['tenhinhanh'] = $tenhinhanh;
        } else {
            return back()->with('error', 'Sản phẩm cần phải có hình ảnh !');
        }

        $data['admin_id'] = Auth::guard('admin')->user()->id;
        $new_sanpham = SanPham::create($data);

        return back()->with('success', 'Sản phẩm đã được thêm !');
    }



    //Update Sản Phẩm chỉ 1 hình ảnh
    public function updateSanPham(ValidateCapNhatSanPham $request, $id)
    {
        $SanPhamDuocChon = SanPham::find($id);
        $ThongtinUpdate = $request->validated();
        $listThietBi = implode(',', $request->input('ThietBiBaoGom'));
        $ThongtinUpdate['ThietBiBaoGom'] = $listThietBi;

        if ($request->has('hinhanh')) {
            $hinhAnhCu = 'product_images/' . $SanPhamDuocChon->tenhinhanh;
            if (File::exists($hinhAnhCu)) {
                File::delete($hinhAnhCu);
            }
            $hinhanh = $request->hinhanh;
            $tenSanPham = SanPhamController::slug($request->TenSanPham);
            $tenhinhanh = $tenSanPham . '-image-' . time() . '.' . $hinhanh->extension();
            $hinhanh->move(public_path('product_images'), $tenhinhanh);
            $SanPhamDuocChon['tenhinhanh'] = $tenhinhanh;
        }
        $SanPhamDuocChon['admin_id'] = Auth::guard('admin')->user()->id;
        $SanPhamDuocChon->fill($ThongtinUpdate);

        $SanPhamDuocChon->save();

        return redirect()->route('showListSanPham')->with('success', 'Thông tin sản phẩm đã được cập nhật !');
    }


    //Xóa Sản Phẩm chỉ có 1 hình ảnh
    public function xoaSanPham($id)
    {
        $SanPhamDuocChon = SanPham::find($id);
        if (!$SanPhamDuocChon) return back()->with('error', 'Không tìm thấy sản phẩm !');
        if (ChiTietDonHang::where('san_pham_id', '=', $id)->exists()){
            return response()->json(['cancel' => 'Sản phẩm đang có trong một đơn hàng của khách hàng !']);
        }
        if (CartDetails::where('san_pham_id', '=', $id)->exists()){
            return response()->json(['cancel' => 'Sản phẩm đang có trong một giỏ hàng của khách hàng !']);
        }
        $hinhAnhCu = 'product_images/' . $SanPhamDuocChon->tenhinhanh;
        if (File::exists($hinhAnhCu)) {
            File::delete($hinhAnhCu);
        }

        // Delete the product
        $SanPhamDuocChon->delete();

        return response()->json(['success' => 'Sản phẩm đã bị xóa']);
    }

    public function thayDoiTinhTrangSanPham($id)
    {

        $SanPhamDuocChon = SanPham::find($id);
        $tinhTrang = $SanPhamDuocChon['TinhTrang'];
        if ($tinhTrang != 0) {
            $SanPhamDuocChon['TinhTrang'] = 0;
        } else {
            $SanPhamDuocChon['TinhTrang'] = 1;
        }
        $SanPhamDuocChon->save();


        return response()->json(['status' => 'Tình trạng của sản phẩm đã được thay đổi']);
    }

    public function filterSanPham(Request $request)
    {


        //$listSanPham = SanPham::orderBy('id', 'desc')->paginate(5);
        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();

        $result = SanPham::query();

        $SanPhamId = $request->input('SanPhamId');
        $tenSanPham = $request->input('TenSanPham');
        $idDanhMuc = $request->input('danh_muc_id');
        $idNhaCungCap = $request->input('nha_cung_cap_id');
        $tinhTrang = $request->input('TinhTrang');
        $HoTroBluetooth = $request->input('HoTroBluetooth');
        $GPU = $request->input('GPU');
        $CPU = $request->input('CPU');
        $RAM = $request->input('RAM');
        $BoNhoTrong = $request->input('BoNhoTrong');
        $TinhTrang = $request->input('TinhTrang');

        $result->when($SanPhamId, function ($query, $SanPhamId) {
            $query->where('id', $SanPhamId);
        });

        $result->when($tenSanPham, function ($query, $tenSanPham) {
            $query->where('TenSanPham', 'LIKE', '%' . $tenSanPham . '%');
        });

        $result->when($idDanhMuc, function ($query, $idDanhMuc) {
            $query->where('danh_muc_id', $idDanhMuc);
        });

        $result->when($idNhaCungCap, function ($query, $idNhaCungCap) {
            $query->where('nha_cung_cap_id', $idNhaCungCap);
        });

        // $listSanPham->when($tinhTrang , function ($query, $tinhTrang) {
        //     $query->where('TinhTrang','=', $tinhTrang);

        // });

        $result->when($tinhTrang == 0 , function ($query) {
            $query->where('TinhTrang', 0);

        });

        $result->when($tinhTrang == 1 , function ($query) {
            $query->where('TinhTrang', 1);

        });

        $result->when($HoTroBluetooth, function ($query, $HoTroBluetooth) {
            $query->where('HoTroBluetooth', $HoTroBluetooth);
        });

        $result->when($TinhTrang, function ($query, $TinhTrang) {
            $query->where('TinhTrang', $TinhTrang);
        });

        $result->when($GPU, function ($query, $GPU) {
            $query->where('GPU', 'LIKE', '%' . $GPU . '%');
        });

        $result->when($CPU, function ($query, $CPU) {
            $query->where('CPU',  'LIKE', '%' . $CPU  . '%');
        });

        $result->when($RAM, function ($query, $RAM) {
            $query->where('RAM',  'LIKE', '%' . $RAM . '%');
        });

        $result->when($BoNhoTrong, function ($query, $BoNhoTrong) {
            $query->where('BoNhoTrong',  'LIKE', '%' . $BoNhoTrong . '%');
        });

        $listSanPham = $result->orderBy('id', 'desc')->paginate(5);

        return view('Admin.Product.product_filter_list', compact('listSanPham', 'listDanhMuc', 'listNhaCungCap'));
    }







    //User


    public function showListSanPhamHome()
    {
        // $listSanPham = SanPham::orderByRaw('updated_at - created_at DESC')->paginate(8);
        $listSanPham = SanPham::orderBy('san_phams.id', 'DESC')->paginate(8);
        $listSanPhamMayChoiGame = DB::table('san_phams')
            ->leftjoin('danh_mucs', 'danh_mucs.id', '=', 'san_phams.danh_muc_id')
            ->where('danh_mucs.TenDanhMuc', '=', 'Máy Chơi Game')
            ->select('san_phams.*', 'danh_mucs.*', 'san_phams.id as id')->orderBy('san_phams.id', 'DESC')->paginate(8);
        $listSanPhamGame = DB::table('san_phams')
            ->join('danh_mucs',  'danh_mucs.id', '=', 'san_phams.danh_muc_id')
            ->where('danh_mucs.TenDanhMuc', '=', 'Game')
            ->select('san_phams.*', 'danh_mucs.*', 'san_phams.id as id')->orderBy('san_phams.id', 'DESC')->paginate(8);
        $listSanPhamPhuKien = DB::table('san_phams')
            ->join('danh_mucs',  'danh_mucs.id', '=', 'san_phams.danh_muc_id')
            ->where('danh_mucs.TenDanhMuc', '=', 'Phụ kiện')
            ->select('san_phams.*', 'danh_mucs.*', 'san_phams.id as id')->orderBy('san_phams.id', 'DESC')->paginate(8);
        $listSanPhamTheGame = DB::table('san_phams')
            ->join('danh_mucs',  'danh_mucs.id', '=', 'san_phams.danh_muc_id')
            ->where('danh_mucs.TenDanhMuc', '=', 'Thẻ game')
            ->select('san_phams.*', 'danh_mucs.*', 'san_phams.id as id')->orderBy('san_phams.id', 'DESC')->paginate(8);

        return view('User.home', compact('listSanPham', 'listSanPhamMayChoiGame', 'listSanPhamPhuKien', 'listSanPhamTheGame', 'listSanPhamGame'));
    }

    public function showListSanPhamUser()
    {

        if (isset($_GET['sort_by'])) {

            $search_text = $_GET['sort_by'];
            if ($search_text == "name") {
                $listSanPham = SanPham::orderBy('san_phams.id', 'ASC')->paginate(8);
            } else if ($this->sorting == 'price') {
                $listSanPham = SanPham::orderBy('san_phams.DonGia', 'ASC')->paginate(8);
            }
        } else {
            $listSanPham = SanPham::orderBy('san_phams.id', 'DESC')->paginate(8);
        }
        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();

        return view('User.Sanpham.Danhsach', compact('listSanPham', 'listDanhMuc', 'listNhaCungCap'));
    }

    public function showDetailSanPhamUser($id)
    {
        // $listSanPham = SanPham::paginate(8);

        $listDanhMuc = DanhMuc::all();
        $listNhaCungCap = NhaCungCap::all();
        $SanPhamDuocChon = SanPham::find($id);
        // $listThietBi = array();
        // $listThietBi = explode(',', $SanPhamDuocChon->ThietBiBaoGom);
        //$listSanPham = DB::table('san_phams')->where('danh_muc_id', $SanPhamDuocChon->danh_muc_id)->get();
        $idDanhMuc = DanhMuc::where('id', $SanPhamDuocChon->danh_muc_id)->first();
        $listSanPham = SanPham::where('danh_muc_id', $idDanhMuc->id)->orderBy('san_phams.id', 'DESC')->get();
        return view('User.Sanpham.chitietsanpham', compact('listDanhMuc', 'listNhaCungCap', 'SanPhamDuocChon', 'listSanPham'));
    }
    public function showListSanPhamTheoDanhMuc($id)
    {

        $listDanhMuc = DanhMuc::where('id', $id)->first();
        $DanhMucDuocChon = DanhMuc::where('id', $id)->first();
        $listSanPham = SanPham::where('danh_muc_id', $listDanhMuc->id)->orderBy('san_phams.id', 'DESC')->where('TinhTrang', '1')->paginate(6);


        return view('User.Sanpham.sanphamtheodanhmuccon', compact('listDanhMuc', 'listSanPham', 'DanhMucDuocChon'));
    }
    public function showListSanPhamTheoDanhMucLon($id)
    {

        $listDanhMuc = DanhMuc::where('TenDanhMuc', $id)->first();
        $DanhMucDuocChon = DanhMuc::where('TenDanhMuc', $id)->first();

        $listSanPham = DB::table('san_phams')
            ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
            ->where('danh_mucs.TenDanhMuc', '=', $id)
            ->select('san_phams.*', 'danh_mucs.*', 'san_phams.id as id')->orderBy('san_phams.id', 'DESC')
            ->paginate(6);



        // $listIdSanPham = DB::table('san_phams')->pluck('id')
        //     ->where('san_phams.danh_muc_id', '=', $listSanPham->id);

        // $idDanhMuc = DanhMuc::where('id', $SanPhamDuocChon->danh_muc_id)->first();
        // $listSanPham = SanPham::where('danh_muc_id', $idDanhMuc->id)->get();

        return view('User.Sanpham.sanphamtheodanhmuclon', compact('listDanhMuc', 'listSanPham', 'DanhMucDuocChon'));
    }

    public function TimKiemSanPham()
    {
        if (isset($_GET['query'])) {

            $search_text = $_GET['query'];
            $listSanPham = SanPham::where('TenSanPham', 'LIKE', '%' . $search_text . '%')->orderBy('san_phams.id', 'DESC')->orderBy('id', 'desc')->paginate(5);;

            return view('User.Sanpham.sanphamtimduoc', compact('listSanPham'));
        } else {
            return redirect()->route('showListSanPhamHome');
        }
    }

    public function FilterSanPhamUser(Request $request)
    {

        $listSanPham = SanPham::query();

        $tenSanPham = $request->input('TenSanPham');
        $idDanhMuc = $request->input('danh_muc_id');
        $idNhaCungCap = $request->input('nha_cung_cap_id');
        $HoTroBluetooth = $request->input('HoTroBluetooth');
        $GPU = $request->input('GPU');
        $CPU = $request->input('CPU');
        $RAM = $request->input('RAM');
        $BoNhoTrong = $request->input('BoNhoTrong');

        $listSanPham->when($tenSanPham, function ($query, $tenSanPham) {
            $query->where('TenSanPham', 'LIKE', '%' . $tenSanPham . '%');
        });

        $listSanPham->when($idDanhMuc, function ($query, $idDanhMuc) {
            $query->where('danh_muc_id', $idDanhMuc);
        });

        $listSanPham->when($idNhaCungCap, function ($query, $idNhaCungCap) {
            $query->where('nha_cung_cap_id', $idNhaCungCap);
        });

        $listSanPham->when($HoTroBluetooth, function ($query, $HoTroBluetooth) {
            $query->where('HoTroBluetooth', $HoTroBluetooth);
        });

        $listSanPham->when($GPU, function ($query, $GPU) {
            $query->where('GPU', 'LIKE', '%' . $GPU . '%');
        });

        $listSanPham->when($CPU, function ($query, $CPU) {
            $query->where('CPU',  'LIKE', '%' . $CPU  . '%');
        });

        $listSanPham->when($RAM, function ($query, $RAM) {
            $query->where('RAM',  'LIKE', '%' . $RAM . '%');
        });

        $listSanPham->when($BoNhoTrong, function ($query, $BoNhoTrong) {
            $query->where('BoNhoTrong',  'LIKE', '%' . $BoNhoTrong . '%');
        });

        $listSanPham = $listSanPham->orderBy('id', 'desc')->paginate(5);;

        return view('User.Sanpham.sanphamtimduoc', compact('listSanPham'));
    }
}
