<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectMessage extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['bord_id', 'from_user', 'to_user', 'send_date', 'msg'];

    public function bord()
    {
        return $this->belongsTo('App\Bord');
    }
}
