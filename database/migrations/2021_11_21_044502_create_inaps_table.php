<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->string('nama')->unique();
            $table->string('slug')->unique();
            $table->string('harga');
            $table->string('lokasi');
            $table->string('gambar');
            $table->text('fasilitas');
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
        Schema::dropIfExists('inaps');
    }
}
