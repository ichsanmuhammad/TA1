<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->char('nik',8)->unique();
            $table->string('nama');
            $table->char('jenis_kelamin');
            $table->bigInteger('dokter_id')->unsigned();
            $table->text('alamat')->nullable();
            $table->timestamps();

            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
