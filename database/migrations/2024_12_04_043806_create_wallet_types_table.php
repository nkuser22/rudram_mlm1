<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTypesTable extends Migration
{
    
    public function up()
    {
        Schema::create('wallet_types', function (Blueprint $table) {
            $table->id(); 
            $table->string('name')->unique(); 
			$table->string('slug')->unique(); 
			$table->string('count_in_wallet'); 
			$table->string('wallet_type');
			$table->string('status');
			$table->string('status');
            $table->text('wallet_column')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_types');
    }
}
