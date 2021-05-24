<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->string('kode_pegawai', 8)->unique();
            $table->integer('id_unit')->unsigned();
            $table->foreign('id_unit')->references('id')->on('ref_unit')->onDelete('cascade')->onUpdate('cascade');
            $table->text('alamat');
            $table->integer('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')->references('id')->on('ref_jabatan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_active');
            $table->timestamp('inserted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('inserted_by', 8);
            $table->timestamp('edited_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('edited_by', 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');     
    }
}
