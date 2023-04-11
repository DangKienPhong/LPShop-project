<?php

use App\Models\Admin;
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
        Schema::create('lien_hes', function (Blueprint $table) {
            $table->id();
            $table->string('TieuDe');
            $table->string('TenNguoiGui');
            $table->string('Email');
            $table->string('TenCongTy');
            $table->integer('TinhTrang');
            $table->string('NoiDung');
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
        Schema::dropIfExists('lien_hes');
        Schema::table('lien_hes', function ($table) {
            $table->dropColumn('TinhTrang');
        });
    }
};
