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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->unsignedInteger('product_category_id')->foreign('id')->references('id')->on('product_categories')->onDelete('cascade')->comment('Foreign key from product_categories id');
            $table->string('unit_type',5);
            $table->string('images',50)->nullable();
            $table->string('price',50);
            $table->string('discount_percentage',20);
            $table->string('discount_amount',20);
            $table->date('discount_from',50);
            $table->date('discount_to',50);
            $table->string('tax_percentage',20);
            $table->string('tax_amount',20);
            $table->string('in_stock',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
