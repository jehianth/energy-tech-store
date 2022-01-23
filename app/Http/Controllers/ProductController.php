<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use PDF;

class ProductController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Product::where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
            $data = Product::paginate(5);
        }
        //dd($data);
        return view('product', compact('data'));
    }
    public function add(){
        return view('add');
    }
    public function insert(Request $request){
        $data = Product::create($request->all());
        if($request->hasFile('photo')){
            $request->file('photo')->move('productphoto/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route("product")->with('success', "Product added successfully!");
    }
    public function edit($id){
        $data = Product::find($id);
        //dd($data);
        return view('edit', compact('data'));
    }
    public function update(Request $request, $id){
        $data = Product::find($id);
        //if($request->hasFile('photo')){
        //    $request->file('photo')->move('productphoto/', $request->file('photo')->getClientOriginalName());
        //    $data->photo = $request->file('photo')->getClientOriginalName();
        //    $data->save();
        //}
        $data->update($request->all());
        return redirect()->route("product")->with('success', "Product edited successfully!");
    }
    public function delete($id){
        $data = Product::find($id);
        $data->delete();
        return redirect()->route("product")->with('success', "Product deleted successfully!");
    }
    public function exportpdf(){
        $data = Product::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('product-pdf');
        return $pdf->download('data.pdf');
    }
}
