<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Storage;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::get();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProductCategory::get();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function _saveproductImage($id, $request)
    {
        $image = $request;
        $slug = Str::slug($image);
        $fileName = $slug.'.'.$image->getClientOriginalExtension();
        $folder = '/uploads/product/images';
        $filepath = $image->storeAs($folder, $fileName, 'public');

        $largeImageFilePath = 'uploads/product/images' . '/large/' . $fileName;
        $largeImageFile = Image::make($image)->fit(478, 512)->stream();
        \Storage::put('public/' . $largeImageFilePath, $largeImageFile);
        $resizedImage = $largeImageFilePath;

        $mediumFilePath = 'uploads/product/images' . '/medium/' . $fileName;
        $mediumFile = Image::make($image)->fit(270, 352)->stream();
        \Storage::put('public/' . $mediumFilePath, $mediumFile);
        $resizedmediumImage = $mediumFilePath;

        $smallFilePath = 'uploads/product/images' . '/small/' . $fileName;
        $smallFile = Image::make($image)->fit(170, 170)->stream();
        \Storage::put('public/' . $smallFilePath, $smallFile);
        $resizedsmallImage = $smallFilePath;

        $extraFilePath = 'uploads/product/images' . '/extra_large/' . $fileName;
        $extraFile = Image::make($image)->fit(700, 710)->stream();
        \Storage::put('public/' . $extraFilePath, $extraFile);
        $resizedextraImage = $extraFilePath;
        ProductImage::create([
            'product_id' => $id,
            'small' => $resizedsmallImage,
            'large' => $resizedImage,
            'medium' => $resizedmediumImage,
            'extra_large' => $resizedextraImage
        ]);

    }

    public function store(Request $request)
    {
        $params = $request->all();
        // dd($params);
        $saved = Product::create([                
            'product_category_id' => $params['product_category_id'],
            'name' => $params['name'],
            'slug' => Str::slug($params['name']),
            'detail' => $params['detail'],
            'stock' => $params['stock'],
            'vendor_price' => $params['vendor_price'],
            'retail_price' => $params['retail_price'],
            'discount' => $params['discount'],
            'status' => $params['status'],
            'user_id' => Auth::user()->id,
            'vendor_id' => 1,
            'created_at' => Carbon::now()
        ]);

        if ($saved) {
            $images = $request->image;
            $countImg = count($images);
            for ($i=0; $i <$countImg ; $i++) {
                $img = $images[$i];
                $this->_saveproductImage($saved->id,$img);
            }
            return redirect('product')->with('success', 'Data added Successfully');
       }else{
        return redirect('product')->with('failed', 'Data added failed');
       }
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
        $data = Product::where('id', $id)->first();
        $category = ProductCategory::get();
        return view('admin.product.edit', compact('data', 'category'));
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
        $params = $request->all();

        $saved = Product::where('id', $id)->update([
            'product_category_id' => $params['product_category_id'],
            'name' => $params['name'],
            'detail' => $params['detail'],
            'stock' => $params['stock'],
            'vendor_price' => $params['vendor_price'],
            'retail_price' => $params['retail_price'],
            'discount' => $params['discount'],
            'status' => $params['status'],
            'user_id' => Auth::user()->id,
            'vendor_id' => 1,
            'updated_at' => Carbon::now()
        ]);
        if($saved){
            return redirect('product')->with('success', 'Data Update Successfully');
        }else{
            return redirect('product')->with('failed', 'Data Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Delete Product Successfully!');
    }

    public function edit_image($id){
        //
        $image = ProductImage::where('product_id',$id)->get();
        return view('admin.product.edit_image',compact('image','id'));
    }
    public function add_image($id,Request $request){
        $saved = $this->_saveproductImage($id,$request->image);
        return redirect()->back()->with('success', 'Data Add Successfully');

    }
    public function destroy_image($id)
    {
        $productImage = ProductImage::findOrFail($id);
        Storage::delete(['public/' . $productImage->small, 'public/' . $productImage->medium, 'public/' . $productImage->large, 'public/' . $productImage->extra_large]);
        $productImage->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
