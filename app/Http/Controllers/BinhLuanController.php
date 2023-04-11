<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    //
    public function luuBinhLuan(Request $request, $id)
    {
        $data = $request->validate([
            'TenNguoiBinhLuan' => 'required',
            'BinhLuan' => 'required',
            'DanhGia' => 'required| min:1 | max:5',

        ], [
            'TenNguoiBinhLuan.required' => 'Hãy nhập tên của bạn !',
            'BinhLuan.required' => 'Hãy nhập bình luận !',
            'DanhGia.required' => 'Hãy chọn số sao bạn đánh giá cho sản phẩm !',
            'DanhGia.min' => 'Đánh giá phải lớn hơn 1 !',
            'DanhGia.max' => 'Đánh giá phải nhỏ hơn hoặc bằng 5 !',

        ]);


        $data['san_pham_id'] = $id;
        if (auth()->user()) {
            $user = auth()->user();
            $data['user_id'] = $user->id;
        } else {
            $data['user_id'] = 0;
        }
        $binhLuan = BinhLuan::create($data);
        return redirect()->route('showDetailSanPhamUser', ['id_sanpham' => $id]);
    }
}
