<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'power',
        'doors',
        'thumb',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function optionals() {
        return $this->belongsToMany('App\Optional');
    }
}
