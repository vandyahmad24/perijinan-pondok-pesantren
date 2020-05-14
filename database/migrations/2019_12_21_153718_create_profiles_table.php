<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis');
            $table->string('fullname');
            $table->string('foto');
            $table->enum('jenis_kelamin', ['perempuan', 'laki-laki']);
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->enum('status', ['pondok', 'ijin']);
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
        Schema::dropIfExists('profiles');
    }
}
