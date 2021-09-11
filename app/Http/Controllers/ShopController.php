<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\PetCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.index');
    }

    public function product()
    {
        $product = Product::paginate(10);
        $petCategory = PetCategory::get();
        $productCategory = ProductCategory::get();
        return view('shop.product', compact('product', 'petCategory', 'productCategory'));
    }

    public function product_detail($id)
    {
        $product = DB::table('product as a')
        ->leftjoin('product_category as b', 'a.product_category_id', '=', 'b.id')
        ->select('a.*', 'b.name as category')
        ->where('a.id', $id)
        ->first();

        $product_image = ProductImage::where('product_id', $id)->get();
        return view('shop.product_detail', compact('product', 'product_image'));
    }

    public function cart()
    {
        return view('shop.shopping-cart');
    }

    public function checkout()
    {
        return view('shop.checkout');
    }

    public function about()
    {
        return view('shop.about');
    }

    public function contact()
    {
        return view('shop.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    // public function pet_category($id){
    //     $cat = PetCategory::where('slug',$id)->first();
    //     $pet = Pet::where('pet_category_id',$cat->id)->get();
    //     $petCategory = PetCategory::get();

    //     $productCategory = ProductCategory::get();
    //     return view('shop.product', compact('pet', 'petCategory', 'productCategory'));
    // }

    public function product_category($id){
        $cat = ProductCategory::where('slug', $id)->first();
        $product = Product::where('product_category_id', $cat->id)->paginate(10);
        $productCategory = ProductCategory::get();

        return view('shop.product', compact('product', 'productCategory')); 
    }
}
