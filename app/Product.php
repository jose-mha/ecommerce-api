<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Para que se puedan crear productos con culquier atributo.
    protected $guarded = [];
}
