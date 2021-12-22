<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicMessage extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['send_user', 'send_date', 'public_msg'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
