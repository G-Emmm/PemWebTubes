<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUraianPekerjaanJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uraian_pekerjaan_jabatan', function (Blueprint $table) {
            $table->increments('id');
            
            // $table->string('id_jabatan', 8);
            $table->integer('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')->references('id')->on('ref_jabatan')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('id_uraian_pekerjaan', 8);
            $table->integer('id_uraian_pekerjaan')->unsigned();
            $table->foreign('id_uraian_pekerjaan')->references('id')->on('uraian_pekerjaan')->onDelete('cascade')->onUpdate('cascade');
            
            // composite key
            $table->unique(['id_jabatan', 'id_uraian_pekerjaan']);

            $table->timestamp('inserted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('inserted_by', 30);
            $table->timestamp('edited_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('edited_by', 30);
            $table->boolean('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uraian_pekerjaan_jabatan');
    }
}
