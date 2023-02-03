<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [];


    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }


    // relazione 1 a molti piatti
    public function products(): BelongsTo
    {

        return $this->belongsTo(Products::class);
    }


    // relazioni categorie
    public function categories(): BelongsToMany
    {

        return $this->belongsToMany(Category::class);
    }
}
