<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return Inertia::render('products/Index',compact('products'));
    }
    public function create(){
        return Inertia::render('products/Create',[]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        product::create($data);
         return redirect()->route('products.index')->with('message','added product succesfully');
       
    }
}
