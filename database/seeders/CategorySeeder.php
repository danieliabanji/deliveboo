<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('deliveboo_array.categories');
        // dd($categories);
        foreach ($categories as $category) {
            $newcategory = new Category();
            $newcategory->name = $category['name'];
            $newcategory->slug = Str::slug($newcategory->name, '-');
            $newcategory->image = $category['image'];
            $newcategory->save();
        }
    }
}
