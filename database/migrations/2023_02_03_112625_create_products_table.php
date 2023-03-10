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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->string('name', 100);
            $table->string('slug', 200)->unique();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            // $table->string('type', 50)->nullable();
            $table->decimal('price', 5, 2);
            $table->boolean('available')->default(false);
            $table->tinyInteger('discount')->nullable();
            // $table->foreign('restaurant_id')->references('id')->on('restaurants')->cascadeOnDelete();
            $table->foreignId('restaurant_id')->constrained()->onUpdate('cascade')->onDelete('cascade');


            $table->softDeletes();
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
};
