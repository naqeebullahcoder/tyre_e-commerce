<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=['short_des','description','postage','fitting_price','VAT_percentage','photo','address','phone','email','logo'];


    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id','id');
    }

}
