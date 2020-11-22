<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $fillable = [
        'recipe_name', 'comment', 'iCloud_link'
    ];
}
