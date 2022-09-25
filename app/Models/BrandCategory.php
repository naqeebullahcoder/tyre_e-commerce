<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
    protected $fillable=['name','season','brands'];

// public static function getProductByBrand($id){
//     return Product::where('brand_id',$id)->paginate(10);
// }
    public function products(){
        return $this->hasMany('App\Models\Product','brand_category_id','id');
    }
    public static function getProductByBrand($slug){
        // dd($slug);
        return Brand::with('products')->where('slug',$slug)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }
}
