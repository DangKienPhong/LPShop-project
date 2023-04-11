<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('TenNguoiNhan');
            $table->string('DiaChi');
            $table->string('SoDienThoai');
            $table->string('Email');
            $table->integer('ThanhTien');
            $table->string('GhiChu')->nullable();
            $table->string('PhuongThucThanhToan');
            $table->string('MaGiaoDich')->nullable();
            $table->string('TinhTrang');
            $table->string('LichSuDonHang');
            $table->foreignIdFor(Admin::class)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hangs');
    }
};
