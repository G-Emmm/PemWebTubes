<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUraianPekerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uraian_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('uraian');
            $table->string('keterangan', 50);
            $table->integer('poin');
            $table->boolean('is_active');
            $table->string('satuan');
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
        Schema::dropIfExists('uraian_pekerjaan');
    }
}
