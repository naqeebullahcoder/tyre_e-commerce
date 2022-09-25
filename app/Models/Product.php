<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
class Product extends Model
{
//    protected $fillable=['title','slug','summary','description','cat_id','child_cat_id','price','brand_id','discount','status','photo','size','stock','is_featured','condition','tyer_id',
//        'tyer_brand_id','car_id','brand_category_id','manufacturer_id','short_desc_id','dopt_id','bond_id'];

    protected $fillable=['DEPOT_ID','DEPOT_NAME','BOND_CODE','MANUFACTURER_CODE','EAN','VEHICLE_TYPE','SHORT_DESCRIPTION','LONG_DESCRIPTION','SIZE','BRAND','PATTERN','LOAD_SPEED','SECTION','PROFILE',
        'RIM','LOAD_INDEX','SPEED','XL','RFT','SELFSEAL','BRAND_CATEGORY','SEASON','VEHICLE_SPECIFICATION','MOLD_ID','HOMOLGATION','NOISE_CANCEL','RIM_PROT','WEIGHT','TREAD_DEPTH','VOLUME','CLASS',
        'FUEL','WET','NOISE','NOISE_DB','STOCKBAL','PRICE','IMAGE','cat_id ','child_cat_id ','brand_id ','brand_category_id'];

    public function cat_info(){
        return $this->hasOne('App\Models\Category','id','cat_id');
    }
    public function sub_cat_info(){
        return $this->hasOne('App\Models\Category','id','child_cat_id');
    }
    public static function getAllProduct(){
        return Product::with(['cat_info','sub_cat_info'])->orderBy('id','desc')->paginate(10);
    }
    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->orderBy('id','DESC')->limit(8);
    }
    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }
    public static function getProductBySlug($slug){
        return Product::with(['cat_info','rel_prods','getReview'])->where('slug',$slug)->first();
    }
    public static function countActiveProduct(){
        $data=Product::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function carts(){
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

    public function order()
    {
        return $this->hasMany('App\Order', 'order_id','id');
    }

}
