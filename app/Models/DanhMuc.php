<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DanhMucCon;

class DanhMuc extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $guarded = [];

    // public function has_small_categories()
    // {
    //     return $this->hasMany(DanhMucCon::class);
    // }

    public function get_sanphams()
    {
        return $this->hasMany(SanPham::class);
    }
}
