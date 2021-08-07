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
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('title', 100)->unique();
            $table->text("description");
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image', 250);
            $table->integer('price');
            $table->integer('last_price');
            $table->integer('solds');
            $table->integer('quantity')->nullable();
            $table->smallInteger('best_offers');
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