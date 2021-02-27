<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\User;
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
    public function delete_product($id)
    {
        Product::where('id', $id)->delete();
        return redirect(route('admin.product'))->with('status', 'Data berhasil dihapus!');
    }

    public function order()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }

    public function detail_order($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.detail_order', compact('order'));
    }

    public function edit_order($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.edit_order', compact('order'));
    }

    public function update_order(Request $request, $id)
    {
        Order::where('id', $id)->update([
            'status' => $request->status,
        ]);
        return redirect(route('admin.order'))->with('status', 'Data berhasil diperbarui');
    }

    public function delete_order($id)
    {
        Order::where('id', $id)->delete();
        return redirect(route('admin.order'))->with('status', 'Data berhasil dihapus');
    }

    public function pelanggan()
    {
        $customers = User::where('role', '2')->get();
        return view('admin.pelanggan', compact('customers'));
    }

    public function detail_pelanggan($id)
    {
        $customer = User::where('id', $id)->first();
        return view('admin.detail_pelanggan', compact('customer'));
    }

    public function delete_pelanggan($id)
    {
        User::where('id', $id)->delete();
        return redirect(route('admin.pelanggan'));
    }
}
