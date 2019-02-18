<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class RecipeList extends Model
{
    protected $fillable = ['title', 'recipe', 'user_id'];

    //protected $casts = [
    // 'recipe' => 'array'
    //  ];

  


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// $table->foreign('user_id')->references('id')->on('recipelists');

// pivot table för user och lists:
//php artisan make:migration create_user_recipelist_table --table=user_recipelist --create
// user_id
// recipelist_id