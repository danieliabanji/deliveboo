<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [];




    // relazione 1 a molti piatti
    public function products(): HasMany
    {

        return $this->hasMany(Product::class);
    }


    // relazioni categorie
    public function categories(): BelongsToMany
    {

        return $this->belongsToMany(Category::class);
    }
    public function users(): HasOne
    {

        return $this->hasOne(User::class);
    }
}
