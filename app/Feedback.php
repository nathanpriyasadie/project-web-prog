<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'message','status'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }
}
