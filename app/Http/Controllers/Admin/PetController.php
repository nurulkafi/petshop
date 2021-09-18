<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetCategory;
use App\Models\PetImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Storage;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pet = Pet::get();
        return view('admin.pet.pet.index',compact('pet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = PetCategory::get();
        return view('admin.pet.pet.create',compact('category'));
    }

    public function _savepetImage($id, $request)
    {
        $image = $request;
        $slug = Str::slug($image);
        $fileName = $slug . '.' . $image->getClientOriginalExtension();

        $folder = '/uploads/pet/images';
        $filepath = $image->storeAs($folder, $fileName, 'public');

        $largeImageFilePath = 'uploads/pet/images' . '/large/' . $fileName;
        $largeImageFile = Image::make($image)->fit(478, 512)->stream();
        \Storage::put('public/' . $largeImageFilePath, $largeImageFile);
        $resizedImage = $largeImageFilePath;

        $mediumFilePath = 'uploads/pet/images' . '/medium/' . $fileName;
        $mediumFile = Image::make($image)->fit(270, 352)->stream();
        \Storage::put('public/' . $mediumFilePath, $mediumFile);
        $resizedmediumImage = $mediumFilePath;

        $smallFilePath = 'uploads/pet/images' . '/small/' . $fileName;
        $smallFile = Image::make($image)->fit(170, 170)->stream();
        \Storage::put('public/' . $smallFilePath, $smallFile);
        $resizedsmallImage = $smallFilePath;

        $extraFilePath = 'uploads/pet/images' . '/extra_large/' . $fileName;
        $extraFile = Image::make($image)->fit(700, 710)->stream();
        \Storage::put('public/' . $extraFilePath, $extraFile);
        $resizedextraImage = $extraFilePath;
        PetImage::create([
            'pet_id' => $id,
            'small' => $resizedsmallImage,
            'large' => $resizedImage,
            'medium' => $resizedmediumImage,
            'extra_large' => $resizedextraImage
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $name = $request->name;
       $description = $request->description;
       $weight = $request->weight;
       $stock = $request->stock;
       $status = $request->status;
       $price = $request->price;
       $saved = Pet::create([
            'vendor_id' => 1,
            'user_id' => Auth::user()->id,
            'pet_category_id' => $request->category_id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $description,
            'price' => $price,
            'weight' => $weight,
            'stock' => $stock,
            'status' => $status,
       ]);
       if ($saved) {
        $images = $request->image;
        $countImg = count($images);
        for ($i=0; $i <$countImg ; $i++) {
            $img = $images[$i];
            $this->_savepetImage($saved->id,$img);
        }
        return redirect('pet')->with('success', 'Data added Successfully');
       }else{
        return redirect('pet')->with('failed', 'Data added failed');
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
        $pet = Pet::findOrFail($id);
        $category = PetCategory::get();
        return view('admin.pet.pet.edit',compact('pet','category'));
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
        $name = $request->name;
        $description = $request->description;
        $weight = $request->weight;
        $stock = $request->stock;
        $status = $request->status;
        $price = $request->price;
        $saved = Pet::where('id',$id)->update([
            'vendor_id' => 1,
            'user_id' => Auth::user()->id,
            'pet_category_id' => $request->category_id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $description,
            'price' => $price,
            'weight' => $weight,
            'stock' => $stock,
            'status' => $status,
        ]);
        if($saved){
            return redirect('pet')->with('success', 'Data Update Successfully');
        }else{
            return redirect('pet')->with('failed', 'Data Update Failed');
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
        $petImage = DB::table('pet_image')->where('pet_id', '=', $id)->get();
        for ($i = 0; $i < count($petImage); $i++) {
            Storage::delete(['public/' . $petImage[$i]->small, 'public/' . $petImage[$i]->medium, 'public/' . $petImage[$i]->large, 'public/' . $petImage[$i]->extra_large]);
        }
        Pet::where('id', $id)->delete();
        return redirect('pet')->with('success', 'Data Delete Successfully');
    }
    public function edit_image($id){
        //
        $image = PetImage::where('pet_id',$id)->get();
        return view('admin.pet.pet.edit_image',compact('image','id'));
    }
    public function add_image($id,Request $request){
        $saved = $this->_savepetImage($id,$request->image);
        return redirect()->back()->with('success', 'Data Add Successfully');

    }
    public function destroy_image($id)
    {
        $petImage = PetImage::findOrFail($id);
        Storage::delete(['public/' . $petImage->small, 'public/' . $petImage->medium, 'public/' . $petImage->large, 'public/' . $petImage->extra_large]);
        $petImage->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
