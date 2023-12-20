<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('categories_id');
            $table->integer('qty');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('status')->comment('0=aktif, 1=nonaktif');
            $table->timestamps();


            //membuat relasi jika dihapus pada table product maka akan terhapus jg di table categories
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
