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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('restaurant_name', 100)->unique();
            $table->string('slug', 255);
            $table->string('p_iva', 15)->unique();
            $table->text('address');
            $table->string('contact_phone', 15)->unique()->nullable();
            $table->text('description')->nullable();
            $table->decimal('delivery_price', 5, 2)->unsigned()->default(0);
            $table->timestamp('opening_time')->nullable();
            $table->timestamp('closing_time')->nullable();
            $table->decimal('min_price_order', 5, 2)->unsigned()->default(0);
            $table->string('image');
            $table->string('tinyint', 5)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
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
