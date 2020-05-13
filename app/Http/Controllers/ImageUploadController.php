<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use DB;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function fileCreate(){
        // $data = Product::all();
        $data = Product::select('product.id as id','product.nome AS nome', 'product.descricao AS descricao', 'product.preco AS preco')
                    // ->leftJoin('image_uploads', 'product.id', '=', 'image_uploads.product_id')
                    // ->groupBy('product.nome')
                    ->get();

        $images = ImageUpload::all();

        return view('backend.product.listaproduto', compact('data','images'));
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

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        ImageUpload::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function fileModal($id){
        $fotos = ImageUpload::where('product_id',$id)->get();
        if(count(ImageUpload::where('product_id',$id)->get()) == 0 ){
            $fotos = "";
        }else{
            $fotos = ImageUpload::where('product_id',$id)->get();
        }

        return response()->json($fotos);
       // $fotos = DB::table('image_uploads')->where('product_id',$id)->get();
        //$foto = $fotos->filename;

       // return dd($fotos);
       // return view('backend.product.listaproduto', compact('fotos'));

        //asset('images/1589375052219hqdefault.jpg');

    }
}
