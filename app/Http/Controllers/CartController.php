<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showListCart()
    {

        $listCart = Cart::all();

        return view('User.Sanpham.giohang');
    }
    public function xoaSanPhamKhoiGioHang($id)
    {
        $cart = CartDetails::find($id);
        if (!$cart) return back()->with('error', 'Không tìm thấy sản phẩm !');


        // Delete the product
        $cart->delete();
        return back();
    }
    public function updateSoluongsanpham(Request $request, $id)
    {
        $CartDuocChon = CartDetails::find($id);
        $SoLuong = $request->soluong;

        $CartDuocChon['soluong'] = $SoLuong;
        $CartDuocChon->save();

        // return back()->with('success', 'Thông tin sản phẩm đã được cập nhật !');
        return redirect()->route('showListCart');
    }
    public function checkout()
    {
        $listCart = Cart::all();

        return view('User.Checkout.checkout', compact('listCart'));
    }
    public function luuDonHang(Request $request)
    {

        if (auth()->user()) {
            $user = auth()->user();
            $cart=Cart::where('user_id','=',$user->id)->first();
            $Details= $cart->chitiet;
            // $cardetails= CartDetails::where('cart_id','=',$cart->id)->first();
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
            // $donhang->ThanhTien = $tongtien;
            $donhang->TinhTrang = 'Chờ Phê Duyệt';
            $thoiGianUpdate = Carbon::now()->toDateTimeString();
            $donhang->LichSuDonHang = $thoiGianUpdate . ': Đơn hàng đã được tạo tự động , chờ phê duyệt của quản trị viên.';
            $save = $donhang->save();

            $DonHang = $donhang;

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

                return view('User.Checkout.checkoutthanhcong', compact('DonHang'));
            } else {
                return redirect()->route('showListCart')->with('error', 'Thanh toán thất bại !');
            }
        } else {

            return redirect()->route('user.login')->with('error', 'Bạn hãy đăng nhập để lưu được giỏ hàng');
        }
    }
    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();
            if(Cart::where('user_id','=',$user->id)->exists())
            {

             $CartDuocChon = Cart::where('user_id','=',$user->id)->first();


            }
            else
            {

                $CartDuocChon= new Cart();
                $CartDuocChon->user_id=$user->id;
                $CartDuocChon->TenUser = $user->name;
                $CartDuocChon->Email = $user->email;
                $CartDuocChon->SoDienThoai = $user->phone;
                $CartDuocChon->DiaChi = $user->address;
                $CartDuocChon->save();



            }

            if(CartDetails::where('cart_id','=',$CartDuocChon->id)->where('san_pham_id','=',$id)->exists())
            {
                $CarDetailsDuocChon= CartDetails::where('cart_id','=',$CartDuocChon->id)->where('san_pham_id','=',$id)->first();
            //  $CarDetailsDuocChon->soluong+=1;
                if(isset($CarDetailsDuocChon->soluong))
                {
                $CarDetailsDuocChon->soluong+=1;
                }
                else
                {
                $CarDetailsDuocChon->soluong=1;
                }
                $CarDetailsDuocChon->save();
            }
            else{
                $cart = new CartDetails();
                $SanPhamDuocChon = SanPham::find($id);
                $cart->cart_id = $CartDuocChon->id;
                $cart->san_pham_id = $id;

                $cart->TenSanPham = $SanPhamDuocChon->TenSanPham;
                $cart->TenHinhAnh = $SanPhamDuocChon->tenhinhanh;
                $cart->DonGia = $SanPhamDuocChon->DonGia;
                if (!$request->soluong) {
                    $request->soluong = 1;
                }

                $cart->soluong = $request->soluong;
                $cart->save();
            }
            return redirect()->back()->with('success', 'Sản phẩm đã thêm vào giỏ hàng !');
        } else {

            return redirect()->route('user.login')->with('error', 'Bạn hãy đăng nhập để lưu được giỏ hàng');
        }
    }
}
