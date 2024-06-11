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
            $table->text('name')->nullable();
	    $table->text('cod_prod')->nullable();
            $table->text('sku_id')->nullable();
            $table->decimal('price_brl', 15,2)->nullable();
            $table->decimal('price_usd', 15,2)->nullable();
            $table->text('weight')->nullable();
            $table->text('images')->nullable();
            $table->bigInteger('sankhya_cat_id')->nullable();
            $table->bigInteger('category_cat_id')->nullable();
            $table->text('slug')->nullable();
            $table->float('stock')->nullable();
            $table->longText('info')->nullable();
            $table->text('related_products')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_comex')->default(true);
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
