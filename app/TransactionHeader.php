<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    protected $fillable = [
        'transaction_date', 'user_id'
    ];

    public function TransactionDetail(){
        return $this->hasMany('App\TransactionDetail');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
