<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->date('tanggal_awal', 8);
            $table->date('tanggal_akhir', 8);
            $table->timestamp('inserted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('inserted_by', 30);
            $table->timestamp('edited_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('edited_by', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periode');
    }
}
