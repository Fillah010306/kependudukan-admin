<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kelahiran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bayi');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('tempat_lahir')->nullable();
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->decimal('panjang_badan', 5, 2)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_akte')->nullable();
            $table->foreignId('orangtua_id')->constrained('orang_tua')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelahiran');
    }
};