<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_unit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            // $table->string('id_unit_parent', 8);
            $table->string('level', 20);
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
        Schema::dropIfExists('ref_unit');
    }
}
