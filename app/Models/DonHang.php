<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $guarded = [];
    public function chitiet()
    {
        return $this->hasMany(ChiTietDonHang::class);
    }
    // public function getCreatedAttribute()
    // {
    //     return $this->attributes['created_at'];
    // }
}
