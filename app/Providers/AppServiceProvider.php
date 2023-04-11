<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\SanPham;
use App\Models\DanhMuc;
use App\Models\DanhMucCon;
use App\Models\DonHang;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrapFive();
        View::composer('*', function ($view) {
            $view->with(['listSanPhamMoiNhat' => SanPham::orderBy('id', 'desc')->paginate(4)]);
            $view->with(['listDanhMuc' => DanhMuc::all()]);
            $view->with(['listTenDanhMuc' => DB::table('danh_mucs')->select('TenDanhMuc')->distinct()->get()]);
            $view->with(['listTenDanhMucCon' => DB::table('danh_mucs')->select('TenDanhMucCon')->distinct()->get()]);
            // $view->with(['listDanhMucCon' => DanhMucCon::all()]);
            if (auth()->user()) {
                $user = auth()->user();
                $view->with(['cart' => DB::table('carts')
                ->join('cart_details', 'carts.id','=','cart_details.cart_id')->where('TenUser', $user->name)->count()]);
                // $view->with(['cart' => CartDetails::where('cart_id', $user->name)->count()]);
                $view->with(['cartgiohang' => DB::table('carts')
                ->join('cart_details', 'carts.id','=','cart_details.cart_id')->where('TenUser', $user->name)->get()]);
                // $view->with(['cartgiohang' => Cart::where('TenUser', $user->name)->get()]);
                $view->with(['donhang' => DonHang::where('TenNguoiNhan', $user->name)->get()]);
            } else {
                $view->with(['cart' => 0]);
                $view->with(['cartgiohang' => 0]);
            }
        });
    }
}
