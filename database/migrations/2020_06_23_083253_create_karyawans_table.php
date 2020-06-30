<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('jenis_kelamin');
            $table->bigInteger('jabatan_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('nomor_telepon')->unsigned();
            $table->integer('umur');
            $table->bigInteger('pendidikan_id')->unsigned();
            $table->timestamps();

            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
