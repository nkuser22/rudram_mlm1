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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->string('product_name'); // Name of the product
            $table->string('product_type'); // Type of the product
            $table->unsignedBigInteger('category_id'); // Foreign key for category
            $table->string('brand')->nullable(); // Brand name (optional)
            $table->string('unit')->nullable(); // Unit of measurement (optional)
            $table->boolean('exchangeable')->default(false); // Is the product exchangeable?
            $table->boolean('refundable')->default(false); // Is the product refundable?
            $table->text('product_desc')->nullable(); // Product description (optional)
            $table->string('product_img')->nullable(); // Path to the product image
            $table->decimal('weight', 10, 2)->nullable(); // Weight of the product (optional)
            $table->string('dimension')->nullable(); // Dimensions of the product (optional)
            $table->decimal('price', 10, 2); // Price of the product
            $table->integer('product_qty')->default(0); // Quantity available
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
