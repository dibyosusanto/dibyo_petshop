<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Product;
class GuestController extends Controller
{
    public function index()
    {        
        $product_terlaris = DB::table('orders')
                ->select('product_id', DB::raw('SUM(qty) as total_sales'))
                ->groupBy('product_id')
                ->limit(4)
                ->get();
        return view('guest.index', compact('product_terlaris'));
    }
}
