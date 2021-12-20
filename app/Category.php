<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    public function getLists()
    {
        $categories = Category::pluck('category_name', 'id');
        return $categories;
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
