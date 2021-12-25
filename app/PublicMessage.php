<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicMessage extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['product_id', 'user_id', 'send_date', 'public_msg'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
