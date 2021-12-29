<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'category_id', 'min_price', 'max_price', 'reward', 'description', 'recruit_flg'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function public_messages()
    {
        return $this->hasMany('App\PublicMessage');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
