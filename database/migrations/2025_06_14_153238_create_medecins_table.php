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
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('user_id');
             $table->unsignedBigInteger('specialite_id')->nullable();
             $table->string('adresse_cabinet')->nullable();
             $table->string('telephone')->nullable();
            $table->text('disponibilite')->nullable();
            $table->timestamps();
            // Clés étrangères
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('specialite_id')->references('id')->on('specialites')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medecins');
    }
};
