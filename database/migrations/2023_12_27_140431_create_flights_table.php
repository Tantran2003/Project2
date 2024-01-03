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
        Schema::create('tourlistmonthly', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('keyword',255)->nullable();
            $table->string('desc',255)->nullable();
            $table->string('level',10)->nullable();
            $table->tinyInteger('status')->default(0);
        });
        Schema::create('tourdetailmonthly', function (Blueprint $table) {
            $table->id();
            $table->string('datefrom',255);
            $table->string('dateto',255);
            $table->string('language',255)->nullable();
            $table->string('level',10)->nullable();
            $table->tinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
