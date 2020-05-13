<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('backend.user.index', compact('user'));
    }


    public function create()
    {
        return view('backend.user.add');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.user.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $updateuser = User::find($id);
        $updateuser->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        $deleteuser = User::find($id);
        $deleteuser->delete();
        return redirect()->route('users.index');
    }
}
