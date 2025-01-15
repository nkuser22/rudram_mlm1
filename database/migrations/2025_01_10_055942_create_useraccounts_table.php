<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('useraccounts', function (Blueprint $table) {
            $table->id();
            $table->string('u_code'); 
            $table->boolean('default_account')->default(false);
            $table->json('accounts')->nullable(); 
            $table->string('img')->nullable(); 
            $table->boolean('status')->default(true); 
            $table->timestamps(); 
        });
        
    }



    public function down(): void
    {
        Schema::dropIfExists('useraccounts');
    }
};
