<?php

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
        Schema::create('rw', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dusun_id')->constrained('dusun');
            $table->string('nama');
            $table->string('nama_krw');
            $table->string('nik_krw');
            $table->foreignId('jk_id')->constrained('sex');
            $table->string('kontak')->nullable();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('rw');
    }
};