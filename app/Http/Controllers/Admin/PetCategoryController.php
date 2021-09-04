<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petCategory = PetCategory::get();
        return view('admin.pet.category.index',compact('petCategory'));
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
        $saved = PetCategory::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);
        if ($saved) {
            return redirect()->back()->with('success', 'Data added Successfully');
        }else{
            return redirect()->back()->with('failed', 'Data added failed');
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
    public function edit($id,Request $request)
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
        $petCategory = PetCategory::findOrFail($id);
        $petCategory->name = $request->name;
        $petCategory->user_id = Auth::user()->id;
        $petCategory->save();
        return redirect()->back()->with('success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petCategory = PetCategory::findOrFail($id);
        $petCategory->delete();
        return redirect()->back()->with('success', 'Data delete Successfully');
    }
}
