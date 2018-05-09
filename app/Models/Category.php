<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Category extends BaseModel
{
    protected $fillable = [
        'name', 'description',
    ];
}
