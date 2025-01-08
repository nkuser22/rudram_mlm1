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
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('name'); // Admin's name
            $table->string('email')->unique(); // Admin's email address (unique)
            $table->string('password'); // Admin's password
            $table->string('role')->default('admin'); // Role, default to 'admin'
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
