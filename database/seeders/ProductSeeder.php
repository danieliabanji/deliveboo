<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Restaurant;

use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('deliveboo_array.products');


        foreach ($products as $product) {
            foreach ($product['restaurant_id'] as $restaurant) {
                $newproduct = new Product();
                $newproduct->name = $product['name'];
                $newproduct->slug = Product::getSlug($newproduct->name, $restaurant);
                $newproduct->image = $product['image'];
                $newproduct->description = $product['description'];
                // $newproduct->type = $product['type'];
                $newproduct->price = $product['price'];
                $newproduct->available = $product['available'];
                $newproduct->discount = $product['discount'];
                $newproduct->type_id = $product['type_id'];
                $newproduct->restaurant_id = $restaurant;

                $newproduct->save();
            }


            // $restaurants = $product['restaurant_id'];
            // $newproduct->restaurants()->sync($product['restaurant_id']);
        }

    }
}
