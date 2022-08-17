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
    public function showP_hrana()
    {
        $dogProducts=Product::with('categories')->get();
        return view('p_hrana')->with(['dogProducts'=>$dogProducts]);
    }
    public function showP_odjeca()
    {
        $dogProducts=Product::with('categories')->get();
        return view('p_odjeca')->with(['dogProducts'=>$dogProducts]);
    }
    public function showP_igracke()
    {
        $dogProducts=Product::with('categories')->get();
        return view('p_igracke')->with(['dogProducts'=>$dogProducts]);
    }

    public function showM_hrana()
    {
        $catProducts=Product::with('categories')->get();
        return view('m_hrana')->with(['catProducts'=>$catProducts]);
    }
    public function showM_odjeca()
    {
        $catProducts=Product::with('categories')->get();
        return view('m_odjeca')->with(['catProducts'=>$catProducts]);
    }
    public function showM_igracke()
    {
        $catProducts=Product::with('categories')->get();
        return view('m_igracke')->with(['catProducts'=>$catProducts]);
    }
}
