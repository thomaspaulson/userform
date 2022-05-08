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
        Schema::create('form_submitted', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userform_id');
            $table->timestamps();

            $table->foreign('userform_id')->references('id')->on('userforms');
        });

        Schema::create('submitted_formfeilds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submitted_formfeilds');
        Schema::dropIfExists('form_submitted');
    }
};
