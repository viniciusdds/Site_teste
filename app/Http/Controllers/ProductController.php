<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\ImageUpload;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('backend.product.index', compact('data'));
    }


    public function create()
    {
        return view('backend.product.add');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'nome' => 'required',
            'preco'=> 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        $insert = Product::create([
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'preco' => $request['preco']
        ]);

        if(!$insert){
            return redirect()->route('product.index')->with('error', 'Erro ao Cadastrar');
        }

        return redirect()->route('product.index')->with('success', 'Cadastrado com Sucesso');
    }

    public function show($id)
    {
        return view('backend.product.image', compact('id'));
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return view('backend.product.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $updateProduct = Product::find($id);
        $updateProduct->update([
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'preco' => $request['preco']
        ]);

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $data = Product::find($id);
        $arquivo = ImageUpload::where('product_id', $data->id)->get();
        $count = $arquivo->count();

        for($i=0; $i < $count; $i++){
            $image = $arquivo[$i]['filename'];
            $imagepath = public_path().'/images/'.$image;

            if(file_exists($imagepath)){
                unlink($imagepath);
            }
        }

        $arquivo2 = ImageUpload::where('product_id', $data->id);
        $arquivo2->delete();
        $data->delete();

        return redirect()->back();

    }
}
