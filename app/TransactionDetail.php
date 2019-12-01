<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'figures_id', 'quantity', 'transaction_id'
    ];

    public function TransactionHeader(){
        return $this->belongsTo('App\TransactionHeader');
    }
    public function Figure(){
        return $this->belongsTo('App\Figure');
    }
}
