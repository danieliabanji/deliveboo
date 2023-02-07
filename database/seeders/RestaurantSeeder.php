<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Functions\Helpers;



use Illuminate\Support\Str;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('deliveboo_array.restaurants');

        // $users = User::all();

        foreach ($restaurants as $key => $restaurant) {
            $newrestaurant = new Restaurant();
            // $newrestaurant->user_id = $restaurant['user_id'];
            $newrestaurant->restaurant_name = $restaurant['restaurant_name'];
            $newrestaurant->slug = Helpers::generateSlug($newrestaurant->name);
            $newrestaurant->p_iva = $restaurant['p_iva'];
            $newrestaurant->address = $restaurant['address'];
            $newrestaurant->contact_phone = $restaurant['contact_phone'];
            $newrestaurant->description = $restaurant['description'];
            $newrestaurant->delivery_price = $restaurant['delivery_price'];
            $newrestaurant->opening_time = $restaurant['opening_time'];
            $newrestaurant->closing_time = $restaurant['closing_time'];
            $newrestaurant->min_price_order = $restaurant['min_price_order'];
            $newrestaurant->image = $restaurant['image'];
            $newrestaurant->rating = $restaurant['rating'];
            $newrestaurant->user_id = $key + 1;

            $newrestaurant->save();



            // $categories = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17];

            // $restRandCategory = Arr::random($categories);

            $newrestaurant->categories()->sync($restaurant['category_id']);


        }
    }
}
