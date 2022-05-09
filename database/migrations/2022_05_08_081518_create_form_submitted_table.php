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
        Schema::create('submitted_form', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userform_id');
            $table->timestamps();

            $table->foreign('userform_id')->references('id')->on('userforms');
        });

        Schema::create('submitted_form_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->unsignedBigInteger('submitted_form_id');

            $table->foreign('submitted_form_id')->references('id')->on('submitted_form');

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
        Schema::dropIfExists('submitted_form_fields');
        Schema::dropIfExists('submitted_form');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
