<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formfeilds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->unsignedBigInteger('userform_id');
            $table->timestamps();

            $table->foreign('userform_id')->references('id')->on('userforms');
        });

        Schema::create('formfeild_options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->unsignedBigInteger('formfeild_id');

            $table->foreign('formfeild_id')->references('id')->on('formfeilds');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formfeild_options');
        Schema::dropIfExists('formfeilds');
    }
};
