<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
class GuestController extends Controller
{
    
    public function index()
    {        
        $products = Product::orderBy('created_at')->limit(3)->get();
        return view('guest.index', compact('products'));
    }
}
