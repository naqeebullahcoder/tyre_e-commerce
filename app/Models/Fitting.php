<?php

namespace App\Models;
//use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Fitting extends Model
{
    protected $fillable=['name','sur_name,','address','post_code','city','phone','fax','email','user_id'];

// public static function getProductByBrand($id){
//     return Product::where('brand_id',$id)->paginate(10);
// }
    public function products(){
        return $this->hasMany('App\Models\Product','user_id','id');
    }


//
//    use Notifiable;
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'name', 'sur_name', 'address', 'post_code', 'city', 'phone', 'fax', 'email',
//    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
//
//    /**
//     * Add a mutator to ensure hashed passwords
//     */
//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }

}
