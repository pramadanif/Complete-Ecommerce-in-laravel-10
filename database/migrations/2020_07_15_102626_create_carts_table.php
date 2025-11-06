<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->float('price');
            $table->enum('status',['new','progress','delivered','cancel'])->default('new');
            $table->integer('quantity');
            $table->float('amount');
            // Product snapshot columns to preserve order details
            $table->string('product_title')->nullable();
            $table->string('product_photo')->nullable();
            $table->text('product_summary')->nullable();
            $table->string('product_size')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('SET NULL');
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
        Schema::dropIfExists('carts');
    }
}
