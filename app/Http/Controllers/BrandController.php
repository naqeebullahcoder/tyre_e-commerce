<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
class BrandController extends Controller
{

    public function index()
    {
        $brands=Brand::orderBy('id','DESC')->paginate();
        return view('backend.brand.index')->with('brands',$brands);
    }

    public function create()
    {
        return view('backend.brand.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Brand::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        // return $data;
        $status=Brand::create($data);
        if($status){
            request()->session()->flash('success','Brand successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('brand.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brands=Brand::find($id);
        if(!$brands){
            request()->session()->flash('error','Brand not found');
        }
        return view('backend.brand.edit')->with('brands',$brands);
    }



    public function update(Request $request, $id)
    {
        $brands=Brand::find($id);
        $this->validate($request,[
            'title'=>'string|required',
        ]);
        $data=$request->all();

        $status=$brands->fill($data)->save();
        if($status){
            request()->session()->flash('success','Brand successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('brand.index');
    }


    public function destroy($id)
    {
        $brands=Brand::find($id);
        if($brands){
            $status=$brands->delete();
            if($status){
                request()->session()->flash('success','Brand successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('brand.index');
        }
        else{
            request()->session()->flash('error','Brand not found');
            return redirect()->back();
        }
    }
}
