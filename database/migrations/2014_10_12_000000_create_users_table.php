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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('mobile_number')->nullable();;
            $table->string('email')->nullable();
            $table->unsignedTinyInteger('gender')->nullable()->comment('1->Male, 2->Female, 3->Other');
            $table->string('state')->nullable();;
            $table->string('city')->nullable();;
            $table->text('address')->nullable();
            $table->string('password')->nullable();;
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
