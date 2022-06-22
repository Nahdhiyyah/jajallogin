<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('buku_id');
            $table->string('judul_buku');
            $table->string('buku');
            $table->dateTime('waktu_pinjam');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('buku_id')->references('id')->on('e_books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjams');
    }
}
