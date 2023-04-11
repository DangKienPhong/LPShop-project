<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidateCapNhatSanPham;
use App\Http\Requests\ValidateThemSanPham;
use App\Models\HinhAnh;
use App\Models\SanPham;
use App\Models\NhaCungCap;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\DanhMucController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
}
