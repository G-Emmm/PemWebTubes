<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpRealisasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skp_realisasis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('id_skp_target', 8);
            $table->date('tanggal_awal', 8);
            $table->date('tanggal_akhir', 8);
            $table->string('lokasi');
            $table->integer('jml_realisasi');
            $table->string('keterangan', 50);
            $table->string('path_bukti', 50);
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
        Schema::dropIfExists('skip_realisasis');
    }
}
