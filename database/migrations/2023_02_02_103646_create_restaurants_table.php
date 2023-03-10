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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            $table->string('restaurant_name', 100)->unique();
            $table->string('slug', 255);
            $table->string('p_iva', 15)->unique();
            $table->text('address');
            $table->string('contact_phone', 15)->unique()->nullable();
            $table->text('description')->nullable();
            $table->decimal('delivery_price', 5, 2)->nullable();
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->decimal('min_price_order', 5, 2)->nullable();
            $table->string('image');
            $table->string('rating', 5)->nullable();
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('user_id')->onUpdate('cascade')->onDelete('cascade')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
