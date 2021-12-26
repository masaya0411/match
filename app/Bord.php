<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bord extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['post_user', 'apply_user', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function direct_messages()
    {
        return $this->hasMany('App\DirectMessage');
    }
}
