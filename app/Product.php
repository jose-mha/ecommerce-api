<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
}
