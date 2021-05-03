<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpTarget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skp_target', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('id_pegawai', 8);
            $table->integer('id_pegawai')->unsigned();
            $table->foreign('id_pegawai')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('id_periode', 8);
            $table->integer('id_periode')->unsigned();
            $table->foreign('id_periode')->references('id')->on('periode')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('id_uraian_pekerjaan_jabatan', 8);
            $table->integer('id_jabatan')->unsigned();
            $table->integer('id_uraian_pekerjaan')->unsigned();
            $table->foreign('id_jabatan')->references('id')->on('ref_jabatan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_uraian_pekerjaan')->references('id')->on('uraian_pekerjaan')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['id_jabatan', 'id_uraian_pekerjaan']);

            // add reference to id from uraian_pekerjaan_jabatan
            $table->integer('id_uraian_pekerjaan_jabatan')->unsigned();
            $table->foreign('id_uraian_pekerjaan_jabatan')->references('id')->on('uraian_pekerjaan_jabatan')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('jml_target');
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
        Schema::dropIfExists('skp_target');
    }
}
