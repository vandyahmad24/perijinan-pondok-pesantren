<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perijinans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('type');
            $table->date('mulai_ijin');
            $table->date('akhir_ijin')->nullable();
            $table->string('mapel')->nullable();
            $table->string('alasan')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('status', ['menunggu', 'setuju','tolak']);
            $table->string('catatan')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('perijinans');
    }
}
