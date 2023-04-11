<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cart;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    //
    public function showListDonHang()
    {
        // $listDonHang = DonHang::all();
        // $listDonHang = DonHang::orderBy('id', 'desc')->paginate(5);
        $listDonHang = DonHang::whereNotIn('TinhTrang', ['Hủy Đơn Hàng', 'Nhận Thành Công'])->orderBy('id', 'asc')->paginate(10);
        return view('Admin.Order.order_list', compact('listDonHang'));
    }

    public function showListLichSuDonHang()
    {
        $listLichSuDonHang = DonHang::whereIn('TinhTrang', ['Hủy Đơn Hàng', 'Nhận Thành Công'])->orderBy('id', 'asc')->paginate(10);
        return view('Admin.Order.order_history', compact('listLichSuDonHang'));
    }

    public function showDetailDonHang($id)
    {
        $DonHangDuocChon = DonHang::find($id);
        $listAdmin = Admin::all();
        $ChiTietDonHangDuocChon = $DonHangDuocChon->chitiet;
        return view('Admin.Order.order_detail', compact('DonHangDuocChon', 'listAdmin', 'ChiTietDonHangDuocChon'));
    }

    public function huyDonHang($id, $note)
    {
        $DonHangDuocChon = DonHang::find($id);
        $DonHangDuocChon['TinhTrang'] = 'Hủy Đơn Hàng';
        $DonHangDuocChon['admin_id'] = Auth::guard('admin')->user()->id;

        $thoiGianUpdate = Carbon::now()->toDateTimeString();
        $DonHangDuocChon['LichSuDonHang'] = $DonHangDuocChon['LichSuDonHang'] . ' ' . $thoiGianUpdate . ' : ' . 'Hủy đơn hàng bởi ' . Auth::guard('admin')->user()->name . ' vì ' . $note  . '.';

        $DonHangDuocChon->save();
        return response()->json(['status' => 'Đơn hàng đã bị hủy !']);
    }

    public function nhanDonHangThanhCong($id)
    {
        $DonHangDuocChon = DonHang::find($id);
        $DonHangDuocChon['TinhTrang'] = 'Nhận Thành Công';
        $DonHangDuocChon['admin_id'] = Auth::guard('admin')->user()->id;

        $listSanPhamDat = $DonHangDuocChon->chitiet;
        foreach ($listSanPhamDat as $sanPhamDat) {
            $sanPhamDuocChon = SanPham::find($sanPhamDat->san_pham_id);
            $sanPhamDuocChon['SoLuongTrongKho'] = $sanPhamDuocChon['SoLuongTrongKho'] - $sanPhamDat['SoLuong'];
            $sanPhamDuocChon->save();
        }

        $thoiGianUpdate = Carbon::now()->toDateTimeString();
        $DonHangDuocChon['LichSuDonHang'] = $DonHangDuocChon['LichSuDonHang'] . ' ' . $thoiGianUpdate . ' : ' . 'Đơn hàng đã được ' . Auth::guard('admin')->user()->name . ' xác nhận giao hàng thành công.';

        $DonHangDuocChon->save();
        return response()->json(['status' => 'Đơn hàng đã nhận thành công !']);
    }

    public function vanChuyenDonHang($id)
    {
        // dd($id);
        $DonHangDuocChon = DonHang::find($id);
        $DonHangDuocChon['TinhTrang'] = 'Đang Vận Chuyển';
        $DonHangDuocChon['admin_id'] = Auth::guard('admin')->user()->id;


        $thoiGianUpdate = Carbon::now()->toDateTimeString();
        $DonHangDuocChon['LichSuDonHang'] = $DonHangDuocChon['LichSuDonHang'] . ' ' . $thoiGianUpdate . ' : ' .  Auth::guard('admin')->user()->name . ' xác nhận đơn hàng đã được vận chuyển.';

        $DonHangDuocChon->save();
        return response()->json(['status' => 'Đơn hàng đã được vận chuyển !']);
    }

    public function xoaDonHang($id)
    {
        $DonHangDuocChon = DonHang::find($id);
        $DonHangDuocChon->delete();

        return response()->json(['status' => 'Đơn hàng đã bị xóa']);
    }

    public function filterDonHang(Request $request)
    {
        $result = DonHang::query();

        $DonHangId = $request->input('DonHangId');
        $TenNguoiNhan = $request->input('TenNguoiNhan');
        $SoDienThoai = $request->input('SoDienThoai');
        $Email = $request->input('Email');
        $DiaChi = $request->input('DiaChi');
        $PhuongThucThanhToan = $request->input('PhuongThucThanhToan');
        $TinhTrang = $request->input('TinhTrang');
        $MaGiaoDich = $request->input('MaGiaoDich');
        
        // dd($TenNguoiNhan, $SoDienThoai);
        $result->when($DonHangId, function ($query, $DonHangId) {
            $query->where('id',  $DonHangId);
        });

        $result->when($MaGiaoDich, function ($query, $MaGiaoDich) {
            $query->where('MaGiaoDich',  $MaGiaoDich);
        });

        $result->when($TenNguoiNhan, function ($query, $TenNguoiNhan) {
            $query->where('TenNguoiNhan',  'LIKE', '%' . $TenNguoiNhan . '%');
        });

        $result->when($Email, function ($query, $Email) {
            $query->where('Email',  'LIKE', '%' . $Email . '%');
        });

        $result->when($SoDienThoai, function ($query, $SoDienThoai) {
            $query->where('SoDienThoai',  $SoDienThoai);
        });

        $result->when($DiaChi, function ($query, $DiaChi) {
            $query->where('DiaChi',  'LIKE', '%' . $DiaChi . '%');
        });

        $result->when($PhuongThucThanhToan, function ($query, $PhuongThucThanhToan) {
            $query->where('PhuongThucThanhToan',  $PhuongThucThanhToan);
        });

        $result->when($TinhTrang, function ($query, $TinhTrang) {
            $query->where('TinhTrang',  $TinhTrang);
        });

        $listDonHang = $result->orderBy('id', 'asc')->paginate(5);

        return view('Admin.Order.order_filter_list', compact('listDonHang'));
    }

    //Userpage
    public function showListDonHangUser()
    {
        $user = auth()->user();
        
        $listDonHang = DonHang::where('user_id', $user->id)
            ->WhereNotIn('TinhTrang', ['Hủy Đơn Hàng', 'Nhận Thành Công'])
            ->orderBy('id', 'asc')
            ->paginate(3);
        return view('User.Order.danhsachdonhang',  compact('listDonHang'));
    }

    public function showListLichSuDonHangUser()
    {
        $user = auth()->user();
        
        $listDonHang = DonHang::where('user_id', $user->id)
            ->WhereIn('TinhTrang', ['Hủy Đơn Hàng', 'Nhận Thành Công'])
            ->orderBy('id', 'asc')
            ->paginate(3);
        return view('User.Order.lichsudonhang',  compact('listDonHang'));
    }

    public function showDetailDonHangUser($id)
    {
        $DonHangDuocChon = DonHang::find($id);
        $ListSanPham = SanPham::all();
        $ChiTietDonHangDuocChon = $DonHangDuocChon->chitiet;
        return view('User.Order.chitietdonhang', compact('DonHangDuocChon', 'ChiTietDonHangDuocChon', 'ListSanPham'));
    }

    public function guiThongTinThanhToan(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'diachi' => 'required',

        ], [
            'name.required' => 'Tên đăng nhập không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Thông tin cần điền phải là dạng email',
            'diachi.required' => 'Địa chỉ không được để trống',
        ]);
        if($request->ThanhToan == "COD")
        {
            $cartController = new CartController();
            return $cartController->luuDonHang($request);
        } elseif ($request->ThanhToan == "VNPAY")
        {
            $checkoutController = new DonHangController();
            //$checkoutController->luuDonHangVoiVNPAY($request);
            return $checkoutController->checkout_vnpayment($request);
        }
    }
    public function luuDonHangVoiVNPAY(Request $request){
        if (auth()->user()) {
            $user = auth()->user();
            $cart=Cart::where('user_id','=',$user->id)->first();
            $Details= $cart->chitiet;
            $donhang = new DonHang();
            $donhang->user_id = $user->id;
            $donhang->TenNguoiNhan = $request->name;
            $donhang->Email = $request->email;
            $donhang->SoDienThoai = $request->phone;
            $donhang->DiaChi = $request->diachi;
            if ($request->ghichu != NULL) {
                $donhang->GhiChu = $request->ghichu;
            } else {
                $donhang->GhiChu = "Không có ghi chú";
            }
            $donhang->PhuongThucThanhToan = $request->ThanhToan;
            $donhang->ThanhTien = $request->ThanhTien;
            $donhang->TinhTrang = 'Chưa Thanh Toán';
            $thoiGianUpdate = Carbon::now()->toDateTimeString();
            $donhang->LichSuDonHang = $thoiGianUpdate . ': : Đơn hàng đã được tạo và chờ khách hàng thanh toán.';
            $save = $donhang->save();


            $Details = DB::table('carts')
            ->join('cart_details', 'carts.id','=','cart_details.cart_id')->where('TenUser', $user->name)->get();
            foreach ($Details as $sanpham) {
                ChiTietDonHang::create([
                    'don_hang_id' => $donhang->id,
                    'san_pham_id' => $sanpham->san_pham_id,
                    'TenSanPham' => $sanpham->TenSanPham,
                    'SoLuong' => $sanpham->soluong,
                    'DonGia' => $sanpham->DonGia

                ]);
            }

            if ($save) {
                $listsanpham = Cart::where('TenUser', $user->name)->get();
                Cart::destroy($listsanpham);

                return $donhang;
            } else {
                return redirect()->route('showListCart')->with('error', 'Thanh toán thất bại !');
            }
        } else {

            return redirect()->route('user.login')->with('error', 'Bạn hãy đăng nhập để lưu được giỏ hàng');
        }
    }

    public function checkout_vnpayment(Request $request){

        $donHangController = new DonHangController();
        $donhang = $donHangController->luuDonHangVoiVNPAY($request);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/checkout-vnpayment-success";
        $vnp_TmnCode = "CD9U8Y2R";//Mã website tại VNPAY
        $vnp_HashSecret = "DMLRXSWKJITJIRRXMCNHBRZRPBGCEVOO"; //Chuỗi bí mật

        $vnp_TxnRef = $donhang->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng của website LPSHOP";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->ThanhTien * 100;//Số tiền thanh toán
        $vnp_Locale = 'vn';
        // $vnp_BankCode = $_POST['bank_code'];
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['ThanhToan'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }



    public function capNhatTinhTrangDonHangThanhToanOnline(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TmnCode = "CD9U8Y2R"; //Website ID in VNPAY System
        $vnp_HashSecret = "DMLRXSWKJITJIRRXMCNHBRZRPBGCEVOO"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/vnpay_php/vnpay_return.php";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        
        if($_GET['vnp_TransactionNo'] != 0 ){
            $DonHangDuocChon = DonHang::find($_GET['vnp_TxnRef']);
            $DonHangDuocChon['MaGiaoDich'] = $_GET['vnp_TransactionNo'] ;
            $DonHangDuocChon['TinhTrang'] = 'Chờ Phê Duyệt';

            $thoiGianUpdate = Carbon::now()->toDateTimeString();
            $DonHangDuocChon['LichSuDonHang'] = $DonHangDuocChon['LichSuDonHang'] . ' ' . $thoiGianUpdate . ' : ' . 'Đơn hàng đã được thanh toán thành công.';

            $DonHangDuocChon->save();

            
        }

        $xacNhanThanhToan = $_GET['vnp_TransactionNo'];
        return view('User.Checkout.checkout_vnpay_thanhcong', compact('secureHash','vnp_SecureHash','xacNhanThanhToan'));
    }
}
