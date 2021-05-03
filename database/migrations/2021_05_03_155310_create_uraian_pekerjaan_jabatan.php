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
            // $table->string('id_uraian_pekerjaan', 8);
            $table->timestamp('inserted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('inserted_by', 8);
            $table->timestamp('edited_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('edited_by', 8);
            $table->boolean('is_active');
            // Kurang composite key
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
