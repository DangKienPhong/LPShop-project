<?php

use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->foreignIdFor(DonHang::class);
            $table->foreignIdFor(SanPham::class);
            $table->string('TenSanPham');
            $table->integer('SoLuong');
            $table->integer('DonGia');
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
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};
