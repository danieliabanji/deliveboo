<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    use SoftDeletes;

    protected $guarded = [];

    // public static function generateSlug($name)
    // {
    //     return Str::slug($name, '-');
    // }

    public function restaurants(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
    public static function getSlug($name, $id_restaurant)
    {
        $restaurant = Restaurant::where('id', $id_restaurant)->first();

        $restaurant_name = $restaurant->restaurant_name;

        $name_concateneted = $restaurant_name . '-' . $name;

        $slug = Str::slug($name_concateneted);

        return $slug;

    }

}
