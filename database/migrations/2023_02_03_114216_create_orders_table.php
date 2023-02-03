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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 50);
            $table->string('customer_lastname', 50);
            $table->string('contact_phone', 15);
            $table->string('email', 70);
            $table->text('address');
            $table->timestamp('order_time');
            $table->decimal('price', 7, 2);
            $table->string('discount', 5)->nullable();
            $table->decimal('final_price', 7, 2);
            $table->string('order_code', 15);
            $table->string('delivered_status', 30);
            $table->boolean('paid_status')->unsigned()->default(0);

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
        Schema::dropIfExists('orders');
    }
};
