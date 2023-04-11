<?php

use App\Models\Cart;
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
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cart::class);
            $table->foreignIdFor(SanPham::class);
            $table->string('TenSanPham')->nullable();
            $table->string('TenHinhAnh')->nullable();
            $table->integer('DonGia')->nullable();
            $table->string('soluong')->nullable();
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
        Schema::dropIfExists('cart_details');
    }
};
