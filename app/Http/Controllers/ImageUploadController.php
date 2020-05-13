<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use DB;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function fileCreate(){
        return view('backend.product.listaproduto');
    }

    public function fileStore(Request $request){

        $id = $request->id;
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->product_id = $id;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
}
