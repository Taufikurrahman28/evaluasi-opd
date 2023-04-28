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
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_opd');
            $table->string('nama_web')->nullable();
            $table->date('tanggal_pemantuan');
            $table->string('url_web');
            $table->unsignedBigInteger('periodik_id');
            $table->foreign('periodik_id')->references('id')->on('periodik');
            $table->text('keterangan');
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
        Schema::dropIfExists('evaluasi');
    }
};
