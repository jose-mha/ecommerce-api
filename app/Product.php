<?php

namespace App;

use App\Utils\CanBeRated;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use CanBeRated;
    //Para que se puedan crear productos con culquier atributo.
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(USer::class);
    }

    protected static function booted()
    {
        static::creating( function(Product $product){
            $faker = \Faker\Factory::create();
            $product->image_url = $faker->imageUrl();
            $product->createdBy()->associate( auth()->user() );
        });
    }
}
