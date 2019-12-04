<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'figures_id', 'quantity','user_id'
    ];

    public function Figure(){
        return $this->belongsTo('App\Figure');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
