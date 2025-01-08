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
        Schema::create('rank', function (Blueprint $table) {
            $table->id(); 
            $table->string('u_code'); 
            $table->string('rank'); 
            $table->decimal('rank_per', 5, 2)->default(0.00); 
            $table->decimal('reward', 10, 2)->default(0.00); 
            $table->unsignedBigInteger('rank_id')->nullable(); 
            $table->string('rank_type')->nullable(); 
            $table->enum('status', ['active', 'inactive'])->default('active'); 
            $table->timestamps(); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rank');
    }
};
