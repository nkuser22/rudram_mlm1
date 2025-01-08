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
        Schema::create('dummy_carry', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('u_code'); // Column for u_code
            $table->string('position'); // Column for position
            $table->decimal('carry', 10, 2)->default(0.00); // Column for carry with default value
            $table->enum('status', ['active', 'inactive'])->default('active'); // Enum column for status
            $table->timestamps(); // Adds created_at and updated_at columns
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dummy_carry');
    }
};
