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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rendez_vous_id');
            $table->text('diagnostic')->nullable();
            $table->text('traitement')->nullable();
            $table->date('date_consultation')->nullable();
            $table->timestamps();
            // Clé étrangère
            $table->foreign('rendez_vous_id')->references('id')->on('rendez_vous')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
