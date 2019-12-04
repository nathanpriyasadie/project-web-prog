<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'user_id'
    ];

    public function TransactionDetail(){
        return $this->hasMany('App\TransactionDetail','transaction_id');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
