<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            $order = new Order;
            $order->customer_name = $faker->firstName();
            $order->customer_lastname = $faker->lastName();
            $order->contact_phone = $faker->e164PhoneNumber();
            $order->email = $faker->email();
            $order->address = $faker->address();
            $order->order_time = $faker->dateTimeThisYear();
            $order->final_price = $faker->randomFloat(2, 1, 100);
            $order->order_code = $faker->regexify('[A-Z]{5}[0-9]{5}');
            $order->paid_status = $faker->boolean();

            $order->save();





        }
    }
}