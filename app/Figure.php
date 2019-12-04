<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'description','category_id','quantity','photo_profile','price'
    ];

    public function Category(){
        return $this->belongsTo('App\Category');
    }

    public function TransactionDetail(){
        return $this->hasMany('App\TransactionDetail');
    }

    public function Cart(){
        return $this->hasMany('App\Cart');
    }
}
