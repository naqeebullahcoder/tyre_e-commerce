<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfitMargin extends Model
{
    protected $fillable=['price_from','price_to','profit'];


//    public function products(){
//        return $this->hasMany('App\Models\Product','profit_id','id');
//    }

}
