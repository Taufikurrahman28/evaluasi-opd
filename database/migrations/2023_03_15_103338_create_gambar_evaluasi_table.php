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
        Schema::create('gambar_evaluasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('caption')->nullable();
            $table->string('path');
            $table->unsignedBigInteger('evaluasi_id');
            $table->foreign('evaluasi_id')->references('id')->on('evaluasi');
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
        Schema::dropIfExists('gamabr_evaluasi');
    }
};
