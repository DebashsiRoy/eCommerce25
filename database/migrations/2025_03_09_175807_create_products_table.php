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
            $table->string('title',200);
            $table->string('short_des',500);
            $table->string('price',50);
            $table->string('discount',500);
            $table->string('discount_price',50);
            $table->string('image',200);
            $table->string('stock',100);
            $table->float('star');
            $table->enum('remark',['popular','new','top','special','trending','regular']);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('category_id')->references('id')->on('categories')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('brand_id')->references('id')->on('brands')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
