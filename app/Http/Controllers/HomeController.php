<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'seller') {
            $products = auth()->user()->products()->paginate(15);
            return view('seller.home', compact('products'));

        } else if (auth()->user()->role == 'buyer') {
            $products = Product::paginate(15);
            return view('buyer.home', compact('products'));
        }
    }
}
