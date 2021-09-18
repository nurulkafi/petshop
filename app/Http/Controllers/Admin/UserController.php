<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::get();
        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::get();
        return view('admin.user.create',compact('role'));
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
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'requird'
        ]);

        $saved = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        $saved->assignRole($role);
        return redirect('user')->with('success', 'Data added Successfully');
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
        $user = User::findOrFail($id);
        $oldrole = $user->roles->first();
        $role = Role::get();
        return view('admin.user.edit',compact('user','oldrole','role'));
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
        $user = User::find($id);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $saved = $user->update([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($role);
        return redirect('user')->with('success', 'Data update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->delete();
        return redirect('user')->with('success', 'Data delete Successfully');
    }
}
