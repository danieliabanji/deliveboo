<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Faker\Generator as Faker;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $orders = Order::take(10)->get();
        $products = Product::where('restaurant_id', 1)->get();

        foreach ($orders as $order) {
            foreach ($products as $product) {
                DB::table('order_product')->insert([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity' => $faker->randomDigit(),
                    'current_price' => $product->price,
                ]);
            }
        }

        $orders = Order::skip(10)->take(10)->get();
        $products = Product::where('restaurant_id', 2)->get();

        foreach ($orders as $order) {
            foreach ($products as $product) {
                DB::table('order_product')->insert([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity' => $faker->randomDigit(),
                    'current_price' => $product->price,
                ]);
            }
        }

        $orders = Order::skip(20)->take(10)->get();
        $products = Product::where('restaurant_id', 3)->get();

        foreach ($orders as $order) {
            foreach ($products as $product) {
                DB::table('order_product')->insert([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity' => $faker->randomDigit(),
                    'current_price' => $product->price,
                ]);
            }
        }
    }
}