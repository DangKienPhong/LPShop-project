<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\UserController;
use App\Models\DanhMuc;
use App\Models\DonHang;
use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Userpage Routing

//login - Register cho trang User
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest'])->group(function () {

        Route::view('/login', 'User.login.register')->name('login');
        Route::view('/register', 'User.login.register')->name('register');
        Route::post('/create', [UserController::class, 'luuUser'])->name('luuUser');
        Route::post('/check', [UserController::class, 'xacNhanUser'])->name('xacNhanUser');
        Route::get('/home', [SanPhamController::class, 'showListSanPhamHome'])->name('showListSanPhamHome');
    });

    Route::middleware(['auth', 'checkUser'])->group(function () {
        Route::get('/home', [SanPhamController::class, 'showListSanPhamHome'])->name('showListSanPhamHome');
        Route::get('/logout', [UserController::class, 'dangXuatUser'])->name('dangXuatUser');
    });
});

Route::get('/', function () {
    return view('User.home');
});

Route::get('/contact', function () {
    return view('User.Contact.contact');
});
Route::get('/multi-option-search',  [SanPhamController::class, 'showFormSanPhamUser'])->name('showFormSanPhamUser');
Route::get('/sanpham', function () {
    return view('User.Sanpham.Danhsach');
});

Route::get('/checkout', function () {
    return view('User.Checkout.checkout');
});
Route::get('/cart', function () {
    return view('User.Sanpham.giohang');
});
Route::get('/loginuser', function () {
    return view('User.login');
});
Route::get('/register', function () {
    return view('User.login.register');
});
Route::post('/category/adduser', [UserprofileController::class, 'luuUserprofile'])->name('luuUserprofile');

Route::get('/product-list',  [SanPhamController::class, 'showListSanPhamUser'])->name('showListSanPhamUser');

Route::get('/product-list/id_sanpham={id_sanpham}', [SanPhamController::class, 'showDetailSanPhamUser'])->name('showDetailSanPhamUser');

Route::get('/', [DanhMucController::class, 'showListDanhMucUser'])->name('showListDanhMucUser');

Route::get('productbycategory/{id}', [SanPhamController::class, 'showListSanPhamTheoDanhMuc'])->name('showListSanPhamTheoDanhMuc');

Route::get('productbycategorybig/id={id}', [SanPhamController::class, 'showListSanPhamTheoDanhMucLon'])->name('showListSanPhamTheoDanhMucLon');

Route::get('/search', [SanPhamController::class, 'TimKiemSanPham'])->name('TimKiemSanPham');

Route::post('/filter-result', [SanPhamController::class, 'FilterSanPhamUser'])->name('FilterSanPhamUser');

Route::get('/filter-result', [SanPhamController::class, 'FilterSanPhamUser'])->name('FilterSanPhamUser');

Route::get('/', [SanPhamController::class, 'showListSanPhamHome'])->name('showListSanPhamHome');

Route::get('/cart', [CartController::class, 'showListCart'])->name('showListCart');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/sending-checkout-info', [DonHangController::class, 'guiThongTinThanhToan'])->name('guiThongTinThanhToan');

Route::get('/checkout-with-vnpayment', [CartController::class, 'checkout_vnpayment'])->name('checkout_vnpayment');

Route::get('/cart/id={id}', [CartController::class, 'xoaSanPhamKhoiGioHang'])->name('xoaSanPhamKhoiGioHang');
Route::get('/checkout-success', function () {
    return view('User.Checkout.checkoutthanhcong');
});

Route::get('/checkout-vnpayment-success', [DonHangController::class, 'capNhatTinhTrangDonHangThanhToanOnline'])->name('capNhatTinhTrangDonHangThanhToanOnline');

Route::post('/processing-checkout', [CartController::class, 'luuDonHang'])->name('luuDonHang');

Route::post('/Save-message-info', [LienHeController::class, 'luuLienHe'])->name('luuLienHe');

Route::post('/cart/{id}', [CartController::class, 'addcart'])->name('addcart');

Route::post('/cartupdate/update_id={id}', [CartController::class, 'updateSoluongsanpham'])->name('updateSoluongsanpham');

Route::post('/save-rating-review/{id}', [BinhLuanController::class, 'luuBinhLuan'])->name('luuBinhLuan');

Route::get('/order-list', [DonHangController::class, 'showListDonHangUser'])->name('showListDonHangUser');

Route::get('/order-history', [DonHangController::class, 'showListLichSuDonHangUser'])->name('showListLichSuDonHangUser');

Route::get('/order-detail/{id}', [DonHangController::class, 'showDetailDonHangUser'])->name('showDetailDonHangUser');




//Adminpage Routing

Route::get('/change-password', function () {
    return view('Admin.Login.change_password');
});
Route::post('/checking-password',  [AdminController::class, 'doiPassword'])->name('doiPassword');
Route::get('/profile', function () {
    return view('Admin.Login.admin_profile');
});
//Route của Trang quản lý sản phẩm


Route::get('/product/list',  [SanPhamController::class, 'showListSanPham'])->name('showListSanPham');

Route::get('/product/add', [SanPhamController::class, 'showFormSanPham'])->name('showFormSanPham');

Route::get('/product/search', [SanPhamController::class, 'showFormSearchSanPham'])->name('showFormSearchSanPham');

Route::post('/add-product', [SanPhamController::class, 'luuSanPham'])->name('luuSanPham');

Route::get('/product/view/id={id}', [SanPhamController::class, 'showDetailSanPham'])->name('showDetailSanPham');

Route::get('/product/edit/id={id}', [SanPhamController::class, 'getSanPham'])->name('getSanPham');

Route::put('/product/edit/id={id}', [SanPhamController::class, 'updateSanPham'])->name('updateSanPham');

Route::get('/product/edit_image/id_sanpham={id_sanpham}&id_hinhanh={id_hinhanh}', [SanPhamController::class, 'getHinhAnh'])->name('getHinhAnh');

Route::put('/product/edit_image/id_hinhanh={id}', [SanPhamController::class, 'updateHinhAnh'])->name('updateHinhAnh');

Route::get('/product/deleteImage/id={id}', [SanPhamController::class, 'xoaHinhAnh'])->name('xoaHinhAnh');

Route::delete('/product-delete/{id}', [SanPhamController::class, 'xoaSanPham'])->name('xoaSanPham');

Route::post('/product-change-status/{id}', [SanPhamController::class, 'thayDoiTinhTrangSanPham'])->name('thayDoiTinhTrangSanPhamm');

Route::post('/product/filter-result', [SanPhamController::class, 'filterSanPham'])->name('FilterSanPham');

Route::get('/product/filter-result', [SanPhamController::class, 'filterSanPham'])->name('FilterSanPham');

//Route của Trang quản lý Nhà Cung Cấp
Route::get('/supplier/list', [NhaCungCapController::class, 'showListNhaCungCap'])->name('showListNhaCungCap');

Route::get('/supplier/search', [NhaCungCapController::class, 'showFormSearchNhaCungCap'])->name('showFormSearchNhaCungCap');

Route::post('/supplier/filter-result', [NhaCungCapController::class, 'filterNhaCungCap'])->name('filterNhaCungCap');

Route::get('/supplier/filter-result', [NhaCungCapController::class, 'filterNhaCungCap'])->name('filterNhaCungCap');

Route::get('/supplier/add', function () {
    return view('Admin.Supplier.Supplier_add');
});

Route::post('/supplier/add', [NhaCungCapController::class, 'luuNhaCungCap'])->name('luuNhaCungCap');

Route::get('/supplier/edit/id={id}', [NhaCungCapController::class, 'showDetailNhaCungCap'])->name('showDetailNhaCungCap');

Route::put('/supplier/editNhaCungCap/id={id}', [NhaCungCapController::class, 'chinhSuaNhaCungCap'])->name('chinhSuaNhaCungCap');

Route::delete('/supplier-delete/{id}', [NhaCungCapController::class, 'xoaNhaCungCap'])->name('xoaNhaCungCap');


//Route của Trang quản lý Đơn hàng
Route::get('/order/list', [DonHangController::class, 'showListDonHang'])->name('showListDonHang');

Route::get('/order/search', function () {
    return view('Admin.Order.order_search');
})->name('showFormSearchDonHang');

Route::post('/order/filter-result', [DonHangController::class, 'filterDonHang'])->name('filterDonHang');

Route::get('/order/filter-result', [DonHangController::class, 'filterDonHang'])->name('filterDonHang');

Route::get('/order/history', [DonHangController::class, 'showListLichSuDonHang'])->name('showListLichSuDonHang');

Route::get('/order/detail/id={id}', [DonHangController::class, 'showDetailDonHang'])->name('showDetailDonHang');

Route::post('/order-change-status-to-cancel/{id}/{note}', [DonHangController::class, 'huyDonHang'])->name('huyDonHang');

Route::post('/order-change-status-to-delivery/{id}', [DonHangController::class, 'vanChuyenDonHang'])->name('vanChuyenDonHang');

Route::post('/order-change-status-to-success/{id}', [DonHangController::class, 'nhanDonHangThanhCong'])->name('nhanDonHangThanhCong');

Route::delete('/order-delete/{id}', [DonHangController::class, 'xoaDonHang'])->name('xoaDonHang');

//Route của Trang quản lý User
Route::get('/user_list', [UserController::class, 'showListUser'])->name('showListUser');

Route::get('/user/search', function () {
    return view('Admin.UserProfile.user_search');
})->name('showFormSearchUser');

Route::post('/user/filter-result', [UserController::class, 'filterNguoiDung'])->name('filterNguoiDung');

Route::get('/user/filter-result', [UserController::class, 'filterNguoiDung'])->name('filterNguoiDung');

Route::get('/user_detail/id_user={id}', [UserController::class, 'showDetailUser'])->name('showDetailUser');

Route::post('/ban-user/{id}/{note}', [UserController::class, 'doiTrangThaiUser'])->name('doiTrangThaiUser');

Route::post('/unban-user/{id}/{note}', [UserController::class, 'doiTrangThaiUser'])->name('doiTrangThaiUser');

Route::post('/delete-user-note/{id}', [UserController::class, 'xoaNoteUser'])->name('xoaNoteUser');


//Route của Trang quản lý Danh mục sản phẩm
Route::get('/category/list', [DanhMucController::class, 'showListDanhMuc'])->name('showListDanhMuc');

Route::get('/category/search', [DanhMucController::class, 'showFormSearchDanhMuc'])->name('showFormSearchDanhMuc');

Route::post('/category/filter-result', [DanhMucController::class, 'filterDanhMuc'])->name('filterDanhMuc');

Route::get('/category/filter-result', [DanhMucController::class, 'filterDanhMuc'])->name('filterDanhMuc');

Route::get('/category/add', function () {
    return view('Admin.Category.category_add');
});

Route::get('/category/sub-cateogry-add', [DanhMucController::class, 'showListDanhMucCha'])->name('showListDanhMucCha');

Route::post('/category/add', [DanhMucController::class, 'luuDanhMuc'])->name('luuDanhMuc');

Route::get('/category/edit/id={id}', [DanhMucController::class, 'showDetailDanhMuc'])->name('showDetailDanhMuc');

Route::put('/category/editDanhMuc/id={id}', [DanhMucController::class, 'chinhSuaDanhMuc'])->name('chinhSuaDanhMuc');

Route::delete('/category-delete/{id}', [DanhMucController::class, 'xoaDanhMuc'])->name('xoaDanhMuc');


//Route cho Trang quản lý tin nhắn Liên hệ
Route::get('contact/list', [LienHeController::class, 'showListLienHe'])->name('showListLienHe');

Route::get('contact/search', function () {
    return view('Admin.Contact.Contact_search');
})->name('showFormSearchLienHe');

Route::post('contact/filter-result', [LienHeController::class, 'filterLienHe'])->name('filterLienHe');

Route::post('contact/filter-result', [LienHeController::class, 'filterLienHe'])->name('filterLienHe');

Route::get('contact/show_details/contact_id={id}', [LienHeController::class, 'showDetailLienHe'])->name('showDetailLienHe');

Route::get('contact/change_status/contact_id={id}', [LienHeController::class, 'doiTrangThaiLienHe'])->name('doiTrangThaiLienHe');

Route::delete('/contact-delete/{id}', [LienHeController::class, 'xoaLienHe'])->name('xoaLienhe');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login - Register cho trang Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'Admin.Login.login_page')->name('login');
        Route::view('/register', 'Admin.Login.register_page')->name('register');
        Route::post('/create', [AdminController::class, 'luuAdmin'])->name('luuAdmin');
        Route::post('/check', [AdminController::class, 'xacNhanAdmin'])->name('xacNhanAdmin');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        // Route::get('/home',  [SanPhamController::class, 'showListSanPham'])->name('home');
        Route::get('/product/list',  [SanPhamController::class, 'showListSanPham'])->name('showListSanPham');
        Route::get('/logout', [AdminController::class, 'dangXuatAdmin'])->name('dangXuatAdmin');
    });
});
