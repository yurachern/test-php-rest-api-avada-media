<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('catalog_id')->nullable();
            $table->decimal('price')->nullable();
            $table->string('image_name')->nullable();
            $table->string('model')->nullable();
            $table->text('description')->nullable();
            $table->string('producer')->nullable();
            $table->string('packaging')->nullable();
            $table->string('ean_code')->nullable();
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
        Schema::dropIfExists('products');
    }
}
