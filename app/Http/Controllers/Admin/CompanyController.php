<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use DB, Alert, File, Image;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $company = Company::get();
        return view('admin.company.index', compact('company'));
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
        $params = $request->all();         
        if ($request->path_picture != null || $request->path_picture != "") 
        {
            $image = $request->file('path_picture');
            $dataPicture = time().'.'.$image->extension();
         
            $imagePath = 'uploads/company/images' . '/' . $dataPicture;
            $resizeImage = Image::make($image)->fit(500, 500)->stream();
            \Storage::put('public/' . $imagePath, $resizeImage);
            $resizedImage = $imagePath;

             $save = Company::create([
                'name' => $params['name'],
                'email' => $params['email'],
                'contact_number' => $params['contact_number'],
                'address' => $params['address'],
                'path_picture' => $resizedImage,
            ]);   
        } else {
            $save = Company::create([
                'name' => $params['name'],
                'email' => $params['email'],
                'contact_number' => $params['contact_number'],
                'address' => $params['address'],
            ]);   
        }
        
        if ($save)
        {
            return redirect()->back()->with('success', 'Data added successfully!');
        } else 
        {
            return redirect()->back()->with('error', 'Data added failed!');
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
        $data = Company::findOrFail($id);

        if ($request->path_picture != null || $request->path_picture != "") 
        {
            $image = $request->file('path_picture');
            $dataPicture = time().'.'.$image->extension();
         
            $imagePath = 'uploads/company/images' . '/' . $dataPicture;
            $resizeImage = Image::make($image)->fit(500, 500)->stream();
            \Storage::put('public/' . $imagePath, $resizeImage);
            $resizedImage = $imagePath;

            File::delete(public_path('storage/uploads/company/images', $data->path_picture));
            $save = $data->update([
                'name' => $params['name'],
                'email' => $params['email'],
                'contact_number' => $params['contact_number'],
                'address' => $params['address'],
                'path_picture' => $resizedImage
            ]);
        } else {
           $save = $data->update([
                'name' => $params['name'],
                'email' => $params['email'],
                'contact_number' => $params['contact_number'],
                'address' => $params['address']
            ]); 
        }

        if ($save)
        {
            return redirect()->back()->with('success', 'Data update successfully!');
        } else 
        {
            return redirect()->back()->with('error', 'Data update failed!');
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
        //
    }
}
