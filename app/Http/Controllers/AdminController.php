<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }
    public function product()
    {
        $products = Product::all();
        return view('admin.produk', compact('products'));
    }

    public function input_product(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'picture' => 'required|image|mimes:png,jpeg,jpg',
            'price' => 'required|integer',
            'description' => 'required',
        ]); 
        if($request->hasFile('picture')){
            //menyimpan sementara ke dalam variabel file
            $file = $request->file('picture');
            //ubah nama file
            $filename = $request->product_name . '.' . $file->getClientOriginalExtension();
            //simpan file
            $file->storeAs('public/products', $filename);
            //input data
            $input_product = Product::create([
                'product_name' => $request->product_name,
                'description' => $request->description,
                'picture' => $filename,
                'price' => $request->price,
            ]);
            return redirect(route('admin.product'))->with('status', 'Data berhasil diinput!');
        }    
    }

    public function edit_product(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.edit_product', compact('product'));
    }

    public function update_product(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'picture' => 'image|mimes:png,jpeg,jpg',
            'price' => 'required|integer',
            'description' => 'required',
        ]); 
        if(!empty($request->picture)){
            if($request->hasFile('picture')){
                //menyimpan sementara ke dalam variabel file
                $file = $request->file('picture');
                //ubah nama file
                $filename = $request->product_name . '.' . $file->getClientOriginalExtension();
                //simpan file
                $file->storeAs('public/products', $filename);
                //input data    
                Product::where('id', $id)->update([
                    'product_name' => $request->product_name,
                    'description' => $request->description,
                    'picture' => $filename,
                    'price' => $request->price,
                ]);
            }
        }else{
            Product::where('id', $id)->update([
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
            
            return redirect(route('admin.product'))->with('status', 'Data berhasil diubah!');
        }    
    }
}
