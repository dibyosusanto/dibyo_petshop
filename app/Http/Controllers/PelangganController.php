<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use Auth;
class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = User::where('id', Auth::user()->id)->first();
        return view('pelanggan.index', compact('pelanggan'));
    }
    public function produk()
    {
        $products = Product::all();
        return view('pelanggan.produk', compact('products'));
    }
    public function detail_produk($id)
    {
        $product = Product::where('id', $id)->first();
        return view('pelanggan.detail_produk', compact('product'));
    }
    public function beli_produk($id)
    {
        $product = Product::where('id', $id)->first();
        return view('pelanggan.beli_produk', compact('product'));
    }

    public function save_order(Request $request)
    {
        Order::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'status'=> 0,
        ]);
        return redirect(route('pelanggan.produk'));
    }

    public function pesanan()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('pelanggan.pesanan', compact('orders'));
    }

    public function profile($id)
    {
        $profile = User::where('id', Auth::user()->id)->first();
        return view('pelanggan.profile', compact('profile'));
    }

    public function update_profile(Request $request, $id)
    {
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'no_hp' => $request->no_hp,
        ]);
        return redirect(route('pelanggan.profile', Auth::user()->id))->with('status', 'Data berhasil diperbarui!');
    }
}
