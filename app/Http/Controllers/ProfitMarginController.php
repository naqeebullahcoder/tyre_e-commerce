<?php

namespace App\Http\Controllers;
use App\Models\ProfitMargin;
use Illuminate\Http\Request;

class ProfitMarginController extends Controller
{

    public function index()

    {
        $profit_margins=ProfitMargin::orderBy('id','DESC')->paginate();

        return view('backend.profit-margin.index')->with('profit_margins',$profit_margins);
    }


    public function create()

    {
        $profit_margins=ProfitMargin::get();
        return view('backend.profit-margin.create')->with('profit_margins',$profit_margins);
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'price_from'=>'string|required',
            'price_to'=>'string|required',
//            'profit'=>'string|required',

        ]);

        $data=$request->all();
////        $slug=Str::slug($request->title);
////        $count=Cars::where('slug',$slug)->count();
////        if($count>0){
////            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
////        }
////        $data['slug']=$slug;
////        $data['is_featured']=$request->input('is_featured',0);
////        $size=$request->input('size');
////        if($size){
////            $data['size']=implode(',',$size);
////        }
////        else{
////            $data['size']='';
////        }
////        // return $size;
////        // return $data;
        $status=ProfitMargin::create($data);
        if($status){
            request()->session()->flash('success','Profit Margin Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('profit-margin.index');

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $profit_margins=ProfitMargin::findOrFail($id);
        return view('backend.profit-margin.edit')->with('profit_margins',$profit_margins);
    }


    public function update(Request $request, $id)
    {

        $profit_margins=ProfitMargin::findOrFail($id);
        $this->validate($request,[

            'price_from'=>'string|required',
            'price_to'=>'string|required',
//            'profit'=>'string|required',

        ]);

        $data=$request->all();
//        $data['is_featured']=$request->input('is_featured',0);
//        $size=$request->input('size');
//        if($size){
//            $data['size']=implode(',',$size);
//        }
//        else{
//            $data['size']='';
//        }
//        // return $data;
        $status=$profit_margins->fill($data)->save();
        if($status){
            request()->session()->flash('success','Profit Margin Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('profit-margin.index');
    }


    public function destroy($id)
    {
        $profit_margins=ProfitMargin::findOrFail($id);
        $status=$profit_margins->delete();

        if($status){
            request()->session()->flash('success','Profit Margin successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Profit Margin');
        }
        return redirect()->route('profit-margin.index');
    }

}
