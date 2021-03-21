<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Compound;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->select(DB::raw('products.name, products.price, products.description, products.picture, categories.id as category_id, categories.name as category_name'))
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->get();
        $categories = Category::get();
        return View('product.index',  compact('categories'), compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return View('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return Redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return View('product.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        // show the edit form and pass the shark
//       dd($product, $categories);
        return View('product.create', compact('categories'))
            ->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->only(['name', 'price', 'description', 'picture', 'category_id', 'picture']));
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allProducts()
    {
        $products = DB::table('products')
            ->select(DB::raw('products.id, products.name, products.price, products.description, products.picture, categories.id as category_id, categories.name as category_name'))
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->get();
        return View('products', compact('products'));
    }

    public function filterProducts($id)
    {
        $categories = Category::get();
        $category = Category::find($id);
        $products = DB::table('products')
            ->select(DB::raw('products.id, products.name, products.price, products.description, products.picture, categories.id as category_id, categories.name as category_name'))
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('category_id', $category->id)
            ->get();
        return \Ajax::View('product.index', compact('products'), compact('categories'));
    }
}
