<?php

namespace App\Http\Controllers;

use App\Models\PersonalContact;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PersonalContactController extends Controller
{

    public function index()
    {
        $data = PersonalContact::all();
        return view('backend.personalcontact.index', compact('data'));
    }


    public function create()
    {
        return view('backend.personalcontact.add');
    }


    public function store(Request $request)
    {
        //dd($request);
        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $image);

        $insert = PersonalContact::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'image'=>$image,
        ]);

        if(!$insert){
            return redirect()->route('personalcontact.index')->with('error', 'Erro ao Cadastrar');
        }

        return redirect()->route('personalcontact.index')->with('success', 'Cadastrado com Sucesso');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = PersonalContact::find($id);
        return view('backend.personalcontact.update', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $data = PersonalContact::find($id);

        $valid = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,gif,svg|max:2048'
        ]);

        /* if($valid->fails()){
            return redirect()->back()->withErrors($valid->errors());
        } */

        if($request->hasFile('image')){
            $filepath = public_path('images/');
            $imagepath = $filepath.$data->image;

            if(file_exists($imagepath)){
                @unlink($imagepath);
            }
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $image);
            $data->image = $image;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();


        return redirect()->route('personalcontact.index')->with('success', 'Editado com Sucesso');

    }


    public function destroy($id)
    {
        $data = PersonalContact::find($id);
        $image = $data->image;

        $filepath = public_path('images/');
        $imagepath = $filepath.$image;

        if(file_exists($imagepath)){
            @unlink($imagepath);
        }

        $data->delete();

        return redirect()->route('personalcontact.index');
    }
}
