<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')->get();
        return $products->toJson();
    }

    public function showProductDetail(){
        $product=$_GET['product'];
        $sql="SELECT * FROM products WHERE id=".$product;
        //dd($sql);
        $result=DB::select($sql);
        return $result;
    }

    public function showProductDetailSeg(){
        $product=$_GET['product'];
        $result= DB::table('products')->find($product);
        return $result;

    }
    public function showProductDetailSegORM(Request $request)
    {
        $product=$request->get('product');
        $product = Product::where('id',$product)->get();
        return $product ;
    }

    //EVITAR PORFA
    public function showProductDetailCol(){
        $product=$_GET['product'];
        $column=$_GET['column'];
        $result= Product::select($column)->where('id',$product)->get();
        return $result;
    }
    public function showProductDetailSegByName(){
        $product=$_GET['product'];
        $result= Product::select('name')->where('id',$product)->get();
        return $result;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
