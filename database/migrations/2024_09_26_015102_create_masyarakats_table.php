<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('masyarakats', function (Blueprint $table) {
            $table->char('nik', 16)->primary();
            $table->string('nama', 35);
            $table->string('email')->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('username', 25)->unique();
            $table->string('password')->nullable();
            $table->string('telp', 13)->nullable();

            
            $table->string('provider_id')->nullable();
            $table->string('provider')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masyarakat');
    }
};