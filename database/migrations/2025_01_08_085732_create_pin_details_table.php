<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('pin_details', function (Blueprint $table) {
            $table->id(); 
            $table->string('pin_type'); 
            $table->decimal('pin_rate', 10, 2); 
            $table->decimal('max_pin_rate', 10, 2); 
            $table->decimal('roi', 5, 2); 
            $table->integer('ro_days'); 
            $table->decimal('business_volumn', 10, 2); 
            $table->decimal('pin_value', 10, 2); 
            $table->timestamps(); 
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('pin_details');
    }
};
