<?php
namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\User;
use Auth;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class FrontendController extends Controller
{
    public function index(Request $request){

        return redirect()->route($request->user()->role);
    }
    public function home()
    {
        $width_data=Product::distinct('section')->select('section')->orderby('section','DESC')->get();
        $height_data=Product::distinct('profile')->select('profile')->orderby('profile','DESC')->get();
        $diameter_data=Product::distinct('rim')->select('rim')->orderby('rim','DESC')->get();
        $brand_data=Product::distinct('brand')->select('brand')->orderby('rim','ASC')->get();
        $season_data=Product::distinct('season')->select('season')->orderby('season','ASC')->get();
        $vehicle_type_data=Product::distinct('vehicle_type')->select('vehicle_type')->orderby('vehicle_type','ASC')->get();
        $pattern_data=Product::distinct('pattern')->select('pattern')->orderby('pattern','ASC')->get();

//        $winter_tyres=Product::distinct('pattern')->select('pattern')->orderby('pattern','ASC')->get();
//        $summer_tyres=Product::distinct('pattern')->select('pattern')->orderby('pattern','ASC')->get();
//        $car_tyres=Product::where('vehicle_type','Passenger Car')->distinct('vehicle_type')->select('vehicle_type')->orderby('vehicle_type','ASC')->get();
//        $van_tyres=Product::where('vehicle_type','Commercial Van')->distinct('vehicle_type')->select('vehicle_type')->orderby('vehicle_type','ASC')->get();
//        $four_by_four_tyres=Product::where('vehicle_type','Passenger 4x4')->distinct('vehicle_type')->select('vehicle_type')->orderby('vehicle_type','ASC')->get();
        $new_arrival_tyres=Product::orderby('created_at','DESC')->limit(4)->get();
        $featured_tyres=Product::where('is_featured','!=',NUll)->limit(4)->get();
        $popular_tyres=Product::orderby('created_at','ASC')->limit(4)->get();
        $products=Product::where('status','active')->orderBy('id','DESC')->limit(1)->get();
//        $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();
        // return $category;

        return view('frontend.index')
                ->with('width_data',$width_data)
                ->with('height_data',$height_data)
                ->with('diameter_data',$diameter_data)
                ->with('brand_data',$brand_data)
                ->with('season_data',$season_data)
                ->with('vehicle_type_data',$vehicle_type_data)
                ->with('pattern_data',$pattern_data)
                ->with('new_arrival_tyres',$new_arrival_tyres)
                ->with('featured_tyres',$featured_tyres)
                ->with('popular_tyres',$popular_tyres)
                ->with('product_lists',$products);

    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }

    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function fitting(){


        return view('frontend.pages.fitting-station');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function productSearch(Request $request)
    {
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(1)->get();
        $width_data=Product::distinct('section')->select('section')->orderby('section','DESC')->get();
        $height_data=Product::distinct('profile')->select('profile')->orderby('profile','DESC')->get();
        $diameter_data=Product::distinct('rim')->select('rim')->orderby('rim','DESC')->get();
        $vehicle_type_data=Product::distinct('vehicle_type')->select('vehicle_type')->orderby('vehicle_type','DESC')->get();
        $brand_data=Product::distinct('brand')->select('brand')->orderby('brand','ASC')->get();
        $season_data=Product::distinct('season')->select('season')->orderby('season','ASC')->get();
        $load_index_data=Product::distinct('load_index')->select('load_index')->orderby('load_index','ASC')->get();
        $load_speed_data=Product::distinct('load_speed')->select('load_speed')->orderby('load_speed','ASC')->get();
        $size_data=Product::distinct('size')->select('size')->orderby('size','ASC')->get();
        $xl_data=Product::distinct('xl')->select('xl')->orderby('xl','ASC')->get();
        $brand_compass=Product::where('brand','Compass')->count();
        $brand_hifly=Product:: where('brand','Hifly')->count();
        $brand_nankang=Product::where('brand','Nankang')->count();
        $brand_powertrac=Product::where('brand','Powertrac')->count();
        $brand_avon=Product::where('brand','Avon')->count();
        $brand_grenlander=Product::where('brand','Grenlander')->count();
        $commercail_truck=Product::where('vehicle_type','Commercial Truck')->count();
        $commercail_van=Product::where('vehicle_type','Commercial Van')->count();
        $passenger_4x4=Product::where('vehicle_type','Passenger 4x4')->count();
        $passenger_car=Product::where('vehicle_type','Passenger Car')->count();
        $all_season=Product::where('season','All Season')->count();
        $summer=Product::where('season','Summer')->count();
        $winter=Product::where('season','Winter')->count();
        $size_r_18=Product::where('size','225/35R18')->count();
        $size_r_16=Product:: where('size','235/65R16')->count();
        $size_r_19=Product::where('size','225/55R19')->count();
        $size_r_22=Product::where('size','285/45R22')->count();
        $size_r_17=Product::where('size','235/50R17')->count();

        $section=$request->section;
        $profile=$request->profile;
        $rim=$request->rim;
        $vehicle_type=$request->vehicle_type;
        $brand=$request->brand;
        $season=$request->season;
        $load_index=$request->load_index;
        $load_speed=$request->load_speed;


        $products=Product::
//        orwhere('short_description','like','%'.$request->search.'%')
                    orwhere('section',$request->section)
                    ->orwhere('profile',$request->profile)
                    ->orwhere('rim',$request->rim)
                    ->orwhere('brand',$request->brand)
                    ->orwhere('season',$request->season)
                    ->orwhere('vehicle_type',$request->vehicle_type)
                    ->orwhere('pattern',$request->pattern)
                    ->orwhere('fuel',$request->fuel)
                    ->orwhere('volume',$request->volume)
                    ->orderBy('id','DESC')
                    ->paginate('9');

        return view('frontend.pages.product-search')->with('products',$products)
            ->with('recent_products',$recent_products)
            ->with('width_data',$width_data)
            ->with('height_data',$height_data)
            ->with('diameter_data',$diameter_data)
            ->with('vehicle_type_data',$vehicle_type_data)
            ->with('brand_data',$brand_data)
            ->with('season_data',$season_data)
            ->with('load_index_data',$load_index_data)
            ->with('load_speed_data',$load_speed_data)
            ->with('size_data',$size_data)
            ->with('xl_data',$xl_data)
            ->with('brand_compass',$brand_compass)
            ->with('brand_hifly',$brand_hifly)
            ->with('brand_nankang',$brand_nankang)
            ->with('brand_powertrac',$brand_powertrac)
            ->with('brand_avon',$brand_avon)
            ->with('brand_grenlander',$brand_grenlander)
            ->with('commercail_truck',$commercail_truck)
            ->with('commercail_van',$commercail_van)
            ->with('passenger_4x4',$passenger_4x4)
            ->with('passenger_car',$passenger_car)
            ->with('all_season',$all_season)
            ->with('summer',$summer)
            ->with('winter',$winter)
            ->with('size_r_18',$size_r_18)
            ->with('size_r_16',$size_r_16)
            ->with('size_r_19',$size_r_19)
            ->with('size_r_22',$size_r_22)
            ->with('size_r_17',$size_r_17)
            ->with('section',$section)
            ->with('profile',$profile)
            ->with('rim',$rim)
            ->with('vehicle_type',$vehicle_type)
            ->with('brand',$brand)
            ->with('season',$season)
            ->with('load_index',$load_index)
            ->with('load_speed',$load_speed);
    }

    public function productDetail($slug){
        $product_detail= Product::getProductBySlug($slug);
        $featured_tyre=Product::where('is_featured','!=',NUll)->limit(4)->get();
        $more_products=Product::where('vehicle_type',$product_detail->vehicle_type)
            ->where('size',$product_detail->size)
            ->where('load_speed',$product_detail->load_speed)
            ->where('load_index',$product_detail->load_index)
            ->where('season',$product_detail->season)
            ->where('fuel',$product_detail->fuel)
            ->where('volume',$product_detail->volume)
            ->limit(4)->get();

        return view('frontend.pages.product-detail',compact('product_detail','more_products'))
            ->with('featured_tyres',$featured_tyre);
    }

    public function productGrids(){
        $products=Product::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids);
            // return $products;
        }
        if(!empty($_GET['brands'])){
            $slugs=explode(',',$_GET['brands']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(9);
        }
        // Sort by name , price, category


        return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }
    public function productLists(){
        $products=Product::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids)->paginate;
            // return $products;
        }
        if(!empty($_GET['brands'])){
            $slugs=explode(',',$_GET['brands']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(6);
        }
        // Sort by name , price, category


        return view('frontend.pages.product-lists')->with('products',$products)->with('recent_products',$recent_products);
    }
    public function productFilter(Request $request){
            $data= $request->all();
            // return $data;
            $showURL="";
            if(!empty($data['show'])){
                $showURL .='&show='.$data['show'];
            }

            $sortByURL='';
            if(!empty($data['sortBy'])){
                $sortByURL .='&sortBy='.$data['sortBy'];
            }

            $catURL="";
            if(!empty($data['category'])){
                foreach($data['category'] as $category){
                    if(empty($catURL)){
                        $catURL .='&category='.$category;
                    }
                    else{
                        $catURL .=','.$category;
                    }
                }
            }

            $brandURL="";
            if(!empty($data['brands'])){
                foreach($data['brands'] as $brand){
                    if(empty($brandURL)){
                        $brandURL .='&brands='.$brand;
                    }
                    else{
                        $brandURL .=','.$brand;
                    }
                }
            }
            // return $brandURL;

            $priceRangeURL="";
            if(!empty($data['price_range'])){
                $priceRangeURL .='&price='.$data['price_range'];
            }
            if(request()->is('e-shop.loc/product-grids')){
                return redirect()->route('product-grids',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
            else{
                return redirect()->route('product-lists',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
    }
//    public function productSearch(Request $request){
//        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
//        $products=Product::orwhere('title','like','%'.$request->search.'%')
//                    ->orwhere('slug','like','%'.$request->search.'%')
//                    ->orwhere('description','like','%'.$request->search.'%')
//                    ->orwhere('summary','like','%'.$request->search.'%')
//                    ->orwhere('price','like','%'.$request->search.'%')
//                    ->orderBy('id','DESC')
//                    ->paginate('9');
//        return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
//    }

    public function productBrand(Request $request){
        $products=Brand::getProductByBrand($request->slug);
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }

    }
    public function productCat(Request $request){
        $products=Category::getProductByCat($request->slug);
        // return $request->slug;
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }

    }
    public function productSubCat(Request $request){
        $products=Category::getProductBySubCat($request->sub_slug);
        // return $products;
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->sub_products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->sub_products)->with('recent_products',$recent_products);
        }

    }

    public function blog(){
        $post=Post::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id',$cat_ids);
            // return $post;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $post->where('post_tag_id',$tag_ids);
            // return $post;
        }

        if(!empty($_GET['show'])){
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate(9);
        }
        // $post=Post::where('status','active')->paginate(8);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogDetail($slug){
        $post=Post::getPostBySlug($slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // return $post;
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogSearch(Request $request){
        // return $request->all();
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $posts=Post::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('quote','like','%'.$request->search.'%')
            ->orwhere('summary','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
            ->paginate(8);
        return view('frontend.pages.blog')->with('posts',$posts)->with('recent_posts',$rcnt_post);
    }

    public function blogFilter(Request $request){
        $data=$request->all();
        // return $data;
        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $tagURL="";
        if(!empty($data['tag'])){
            foreach($data['tag'] as $tag){
                if(empty($tagURL)){
                    $tagURL .='&tag='.$tag;
                }
                else{
                    $tagURL .=','.$tag;
                }
            }
        }
        // return $tagURL;
            // return $catURL;
        return redirect()->route('blog',$catURL.$tagURL);
    }

    public function blogByCategory(Request $request){
        $post=PostCategory::getBlogByCategory($request->slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post->post)->with('recent_posts',$rcnt_post);
    }

    public function blogByTag(Request $request){
        // dd($request->slug);
        $post=Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    // Login
    public function login(){
        return view('frontend.pages.login');
    }
    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['emails' => $data['emails'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['emails']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Invalid emails and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register(){
        return view('frontend.pages.register');
    }
    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'emails'=>'string|required|unique:users,emails',
            'password'=>'required|min:6|confirmed',
        ]);
        $data=$request->all();
        // dd($data);
        $check=$this->create($data);
        Session::put('user',$data['emails']);
        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }
    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'emails'=>$data['emails'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
            ]);
    }
    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }

    public function subscribe(Request $request){
        if(! Newsletter::isSubscribed($request->email)){
                Newsletter::subscribePending($request->email);
                if(Newsletter::lastActionSucceeded()){
                    request()->session()->flash('success','Subscribed! Please check your emails');
                    return redirect()->route('home');
                }
                else{
                    Newsletter::getLastError();
                    return back()->with('error','Something went wrong! please try again');
                }
            }
            else{
                request()->session()->flash('error','Already Subscribed');
                return back();
            }
    }

}
