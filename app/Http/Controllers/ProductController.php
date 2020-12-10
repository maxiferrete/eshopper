<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(10);

        return view('backoffice.products.listado', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::all();
        $conditions = Condition::all();
        $categories = Category::all();
        return view('backoffice.products.crear',
            compact(['brands', 'conditions', 'categories'])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $this->SaveProduct($request, $product);
        return redirect(route('products.index'))->with('success', 'Creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('backoffice.products.mostrar', compact(['product']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $brands = Brand::all();
        $conditions = Condition::all();
        $categories = Category::all();
        $subcategories = null;
        if(isset($product->subcategory['id'])){
            $subcategories = Subcategory::where('category_id', $product->category['id'])->select('id','name as subcategory')->get();
        }
        return view('backoffice.products.actualizar', compact(['product', 'brands','conditions','categories', 'subcategories']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $this->SaveProduct($request, $product);

        return redirect(route('products.index'))->with('update', 'Actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function SaveProduct(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->web_id = $request->web_id;
        $product->price = $request->price;

        $brand = Brand::find($request->brand_id);
        $product->brand()->associate($brand);
        //$product->brand_id =$request->brand_id;

        $condition = Brand::find($request->condition_id);
        $product->condition()->associate($condition);

        $category = Brand::find($request->category_id);
        $product->category()->associate($category);

        if($request->subcategory_id){
            $subcategory = Brand::find($request->subcategory_id);
            $product->subcategory()->associate($subcategory);
        }
        $product->save();
        $product->refresh();
        $path = '';
        if($request->file('image')){
            $path = $request->file('image')->store('products/'.$product->id);
        }
        $product->image = $path;
        $product->save();
    }
}
