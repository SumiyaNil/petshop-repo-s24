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
        Schema::create('fosters', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->date('fdate');
            $table->date('tdate');
            $table->string('location');
            $table->double('price',2,10);
            $table->string('instruction');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fosters');
    }
};
