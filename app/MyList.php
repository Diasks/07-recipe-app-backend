<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    protected $fillable = ['id', 'recipe', 'title', 'email'];
    protected $table = 'lists';
    
    protected $casts = [
        'recipe' => 'array',
    ];

}
