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
        // Schema::create('category', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name',255);
        //     $table->string('image',255)->nullable();
        //     $table->string('keyword',255)->nullable();
        //     $table->string('desc',255)->nullable();
        //     $table->string('level',10)->nullable();
        //     $table->string('status')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
