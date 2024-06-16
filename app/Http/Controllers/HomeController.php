<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::take(3)->get();
        return view('welcome', compact('products'));
    }
    public function show(): View
    {
        $products = Product::paginate(8);
        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', "%$query%")->get();
        return response()->json($products);
    }

}