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
        // Schema::create('account', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('fullname',255)->nullable();
        //     $table->string('phone',255)->nullable();
        //     $table->string('address',255)->nullable();
        //     $table->string('email')->unique();
        //     $table->string('password');
        //     $table->tinyInteger('role');  
        //     $table->tinyInteger('status')->default(1);
        //     $table->rememberToken();
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
