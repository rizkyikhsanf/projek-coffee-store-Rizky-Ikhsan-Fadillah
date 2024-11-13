<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // judul gambar
            $table->text('description')->nullable(); // deskripsi gambar
            $table->string('image_path'); // path atau URL gambar
            $table->bigInteger('harga');

            $table->unsignedBigInteger('user_id'); // id pengguna yang mengunggah
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // relasi ke tabel users
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
        Schema::dropIfExists('galleries');
    }
}
