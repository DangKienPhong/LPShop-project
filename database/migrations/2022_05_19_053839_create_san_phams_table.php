<?php

use App\Models\Admin;
use App\Models\DanhMuc;
use App\Models\DanhMucCon;
use App\Models\NhaCungCap;
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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('TenSanPham');
            $table->foreignIdFor(NhaCungCap::class);
            $table->foreignIdFor(DanhMuc::class);
            $table->date('NgayRaMat');
            $table->integer('TinhTrang');
            $table->integer('SoLuongTrongKho');
            $table->string('GPU');
            $table->string('CPU');
            $table->string('RAM');
            $table->string('BoNhoTrong');
            $table->longText('ChucNangHoTro');
            $table->string('HoTroBluetooth');
            $table->string('CongKetNoi');
            $table->string('CongRaAV');
            $table->longText('ThietBiBaoGom');
            $table->integer('DonGia');
            $table->string('tenhinhanh');
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
        Schema::dropIfExists('san_phams');
    }
};
