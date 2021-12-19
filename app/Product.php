<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'category_id', 'min_price', 'max_price', 'reward', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
