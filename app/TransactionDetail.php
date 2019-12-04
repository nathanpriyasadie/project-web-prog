<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'figures_id', 'quantity', 'transaction_id'
    ];

    public function TransactionHeader(){
        return $this->belongsTo('App\TransactionHeader','transaction_id');
    }
    public function Figure(){
        return $this->belongsTo('App\Figure');
    }
}
