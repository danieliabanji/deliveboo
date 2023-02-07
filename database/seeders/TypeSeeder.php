<?php

namespace Database\Seeders;

use App\Functions\Helpers;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('deliveboo_array.types');

        foreach($types as $type){

            $newtype = new Type();
            $newtype->name = $type;
            $newtype->slug = Helpers::generateSlug($newtype->name);
            $newtype->save();
        }
    }
}
