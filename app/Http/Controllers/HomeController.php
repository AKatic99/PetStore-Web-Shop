<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showDogs()
    {
        $dogProducts=Product::with('categories')->get();
        return view('pas')->with(['dogProducts'=>$dogProducts]);
    }

    public function showCats()
    {
        $catProducts=Product::with('categories')->get();

        return view('macka')->with(['catProducts'=>$catProducts]);
    }
}
