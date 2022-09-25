<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fitting;
use Illuminate\Support\Str;

class FittingController extends Controller
{

    public function index()
    {

        $fittings=Fitting::where('user_id',auth()->user()->id)->get();
        return view('backend.fitting-station.index')->with('fittings',$fittings);
    }

    public function create()
    {
        return view('backend.fitting-station.create');
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'string|string',
            'sur_name'=>'string|string',
            'address'=>'string|required',
            'post_code'=>'string|required',
            'city'=>'string|required',
            'phone'=>'string|required',
            'fax'=>'string|required',
            'emails'=>'string|required',
            'user_id'=>'string|'
        ]);

        $station = Fitting::create(request(['name', 'sur_name', 'address','post_code', 'city','phone','fax','emails','user_id']));
        auth()->login($station);

        $data=$request->all();
//        $slug=Str::slug($request->title);
//        $count=Banner::where('slug',$slug)->count();
//        if($count>0){
//            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
//        }
//        $data['slug']=$slug;
//        // return $slug;
        $status=Fitting::create($data);
        if($status){
            request()->session()->flash('success','Fitting successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding Fitting');
        }
       return redirect()->route('fitting-station.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $fittings=Fitting::findOrFail($id);
        return view('user.fitting.edit')->with('fittings',$fittings);
    }


    public function update(Request $request, $id)
    {

        $fittings=Fitting::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'sur_name'=>'string|required',
            'address'=>'string|required',
            'post_code'=>'string|required',
            'city'=>'string|required',
            'phone'=>'string|required',
            'fax'=>'string|required',
            'emails'=>'string|required',
        ]);
        $data=$request->all();
        // $slug=Str::slug($request->title);
        // $count=Banner::where('slug',$slug)->count();
        // if($count>0){
        //     $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        // }
        // $data['slug']=$slug;
        // return $slug;
        $status=$fittings->fill($data)->save();
        if($status){
            request()->session()->flash('success','Fittings successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating Fitting');
        }
        return redirect()->route('fitting-station.index');
    }


    public function destroy($id)
    {
        $fittings=Fitting::findOrFail($id);
        $status=$fittings->delete();
        if($status){
            request()->session()->flash('success','Fitting successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting Fitting');
        }
        return redirect()->route('fitting-station.index');
    }


}
