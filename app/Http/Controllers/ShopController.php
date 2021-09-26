<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\PetCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Province;
use App\Models\City;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

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

    
    public function cart()
    {
        return view('shop.shopping-cart');
    }

    public function checkout()
    {
        $province = Province::get();
        $city = City::get();
        return view('shop.checkout', compact('province', 'city'));
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

    public function product()
    {
        $product = Product::paginate(10);
        $productCategory = ProductCategory::get();
        return view('shop.product', compact('product', 'productCategory'));
    }

    public function product_detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $productName = Product::where('product_category_id', $product->product_category_id)
        ->where('name', '!=', $product->name)
        ->paginate(5);

        return view('shop.product_detail', compact('product', 'productName'));
    }

    public function product_category($id){
        $cat = ProductCategory::where('slug', $id)->first();
        $product = Product::where('product_category_id', $cat->id)->paginate(10);
        $productCategory = ProductCategory::get();
        return view('shop.product', compact('product', 'productCategory'));
    }
    //PET
    public function pet(){
        $pet = Pet::paginate(10);
        $petcategory = PetCategory::get();
        return view('shop.pet',compact('pet','petcategory'));
    }
    public function pet_detail($slug){
        $pet = Pet::where('slug',$slug)->first();
        $petsame = Pet::where('pet_category_id',$pet->pet_category_id)
        ->where('name','!=',$pet->name)
        ->paginate(5);
        return view('shop.pet_detail',compact('pet', 'petsame'));
    }
    public function pet_category($slug){
        $cat = PetCategory::where('slug',$slug)->first();
        $pet = Pet::where('pet_category_id',$cat->id)->paginate(10);
        $petcategory = PetCategory::get();
        return view('shop.pet', compact('pet', 'petcategory'));
    }
    public function pet_sort_by_price($id){
        $pet = Pet::orderBy('price',$id)->paginate(10);
        $petcategory = PetCategory::get();
        return view('shop.pet', compact('pet', 'petcategory'));
    }

    //SEARCH
    public function search(Request $request){
        $search = $request->search;
        return redirect('search/'.$search);
    }
    public function result_search($name)
    {
        $pet = Pet::where('name','like','%'.$name.'%')
                ->paginate(5);
        $product = Product::where('name', 'like', '%' . $name . '%')
                ->paginate(5);
        $petcategory = PetCategory::get();
        $productcategory = ProductCategory::get();
        return view('shop.result_search',compact('pet','product','petcategory', 'productcategory'));
    }
}
