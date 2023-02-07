<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('order_id')->nullable();
            // $table->unsignedBigInteger('product_id')->nullable();
            // $table->string('quantity', 20);

            // $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();

            // $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->tinyInteger('quantity')->unsigned();
            $table->float('current_price', 5, 2)->unsigned();

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
        Schema::dropIfExists('order_product');
    }
};
