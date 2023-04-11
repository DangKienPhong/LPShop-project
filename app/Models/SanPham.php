<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\HinhAnh;
use App\Http\Traits\Filterable;

class SanPham extends Model
{
    //use Filterable;
    use HasFactory;
    protected $fillable = [];
    protected $guarded = [];

    // public function images()
    // {
    //     return $this->hasMany(HinhAnh::class);
    // }

    public function setDateAttribute($value)
    {
        $this->attributes['NgayRaMat'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function getDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['NgayRaMat'])->format('d/m/Y');
    }

    public function get_comments()
    {
        return $this->hasMany(BinhLuan::class);
    }
    public function get_danhmuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }
    // public function filterTenSanPham($query, $value)
    // {
    //     return $query->where('TenSanPham', 'LIKE', '%' . $value . '%');
    // }

    // public function filterdanh_muc_con_id($query, $value)
    // {
    //     return $query->where('danh_muc_con_id', $value);
    // }

    // public function filternha_cung_cap_id($query, $value)
    // {
    //     return $query->where('nha_cung_cap_id', $value);
    // }

    // public function filterNgayRaMat($query, $value)
    // {
    //     return $query->where('NgayRaMat', $value);
    // }

    // public function filterTinhTrang($query, $value)
    // {
    //     return $query->where('TinhTrang', $value);
    // }

    // public function filterHoTroBluetooth($query, $value)
    // {
    //     return $query->where('HoTroBluetooth', $value);
    // }

    // // public function filterThietBiBaoGom($query, $value)
    // // {
    // //     return $query->where('ThietBiBaoGom', 'LIKE', '%' . $value . '%');
    // // }

    // public function filterDonGia($query, $value)
    // {
    //     return $query->where('DonGia', $value);
    // }
}
