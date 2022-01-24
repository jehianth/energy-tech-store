<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'photo' => 'required|file|max:1024',
            'type' => 'required|max:255',
            'entrydate' => 'required|max:255',
            'stock' => 'required|max:255',
        ]);
        //dd('berhasil');
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            //'photo' => 'required|file|max:1024',
            //'type' => 'required|max:255',
            'entrydate' => 'required|max:255',
            'stock' => 'required|max:255',
        ]);
        //$validatedData = $request->validate($validated);
        //if ($request->file('photo')) {
        //    $validatedData['photo'] = $request->file('photo')->update('post-images');
        //}
        $data = Product::find($id);
        //if($request->hasFile('photo')){
        //    $data->photo = $request->file('photo')->path('photo');
        //    $data->update();
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
        $data = Product::all(['name','photo','type','entrydate','stock']);
        view()->share('data', $data);
        $pdf = PDF::loadview('product-pdf');
        return $pdf->download('dataproduct_energy-tech-store.pdf');
    }
    public function exportexcel(){
        return Excel::download(new ProductExport, 'dataproduct_energy-tech-store.xlsx');
    }
    public function importexcel(Request $request){
        $data = $request->file('file');
        $filename = $data->getClientOriginalName();
        $data->move('ProductData', $filename);

        Excel::import(new ProductImport, \public_path('/ProductData/'. $filename));
        return \redirect()->back()->with('success', "Product imported successfully!");
    }
}
