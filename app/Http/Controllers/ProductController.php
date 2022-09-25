<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\ProfitMargin;
use Illuminate\Http\Request;
use Excel;
use App\Imports\ProductImport;

class ProductController extends Controller
{

    public function index()
    {
        $products=Product::orderBy('id','DESC')->paginate(10);
//        $products=Product::getAllProduct();
        return view('backend.product.index')->with('products',$products);
    }


    public function create()
    {

        return view('backend.product.create');
    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//            'select_file'  => 'required|mimes:xls,xlsx'
//        ]);

//        $path1 = $request->file('select_file')->store('temp');
//        $path = $request->file('select_file')->getRealPath();
//        dd($path);

//        $path1 = $this->$request->file('select_file')->store('temp');
//        $path = storage_path('app').'/'.$path1;

//        $profit_margin=ProfitMargin::where('user_id',1)->get();
//        ($profit_margin);

        \Maatwebsite\Excel\Facades\Excel::import(new ProductImport,$request->file('select_file'));
        $profit_margin=ProfitMargin::where('profit_margin_id',1)->first();

        return redirect()->route('product.index')  ->with('profit_margin',$profit_margin);


    }

    public function show(Product $product)
    {

        return view('backend.product.show')->with('products',$product);
    }

    public function edit($id)
    {

        $product=Product::findOrFail($id);
        return view('backend.product.edit')->with('product',$product);

    }

    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $this->validate($request,[

        ]);

        $data=$request->all();
        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }
        else{
            $data['size']='';
        }
        // return $data;
        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
    }


    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }
}
