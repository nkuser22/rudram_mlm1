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
        Schema::create('companypaymethods', function (Blueprint $table) {
            $table->id();
            $table->string('method_name');
            $table->string('unique_name')->unique();
            $table->boolean('default_account')->default(false);
            $table->json('fields_required')->nullable();
            $table->string('image')->nullable();
            $table->string('type');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companypaymethods');
    }
};
