<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nbhdmarkets', function (Blueprint $table) {
            $table->id();
            $table->string('correo')->nullable()->unique();
            $table->string('telefono')->nullable()->unique();
            $table->string('direccion')->nullable();
            $table->string('twitter');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('whatsapp')->nullable()->unique();
            $table->timestamps();

    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nbhdmarket');
    }
};
