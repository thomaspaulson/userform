<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formfields', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->unsignedBigInteger('userform_id');
            $table->timestamps();

            $table->foreign('userform_id')->references('id')->on('userforms');
        });

        Schema::create('formfield_options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->unsignedBigInteger('formfield_id');

            $table->foreign('formfield_id')->references('id')->on('formfields');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('formfield_options');
        Schema::dropIfExists('formfields');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
};
