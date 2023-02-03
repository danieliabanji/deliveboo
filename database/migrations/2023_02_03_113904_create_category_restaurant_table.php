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
        Schema::create('category_restaurant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('restaurant_id')->references('id')->on('restaurants')->cascadeOnDelete();

            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();




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
        Schema::dropIfExists('category_restaurant');
    }
};
