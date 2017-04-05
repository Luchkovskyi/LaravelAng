<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = [
        'id', 'name', 'description', 'categories_id', 'image'
    ];
}
