<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    public function index()
    {
        return Marca::all('id', 'nombre');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $base64_string = $request->get('imagen');
        $nombre = $request->nombre;

        $image = base64_decode($base64_string);
        $filename = 'image_name.png';
        $path = public_path('images/' . $filename);
        file_put_contents($path, $image);

        $marcas = new Marca();
        $marcas->nombre = $nombre;
        $marcas->save();

        return $marcas;
    }

    public function guardarM(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        error_log($request->imagen);
        //get image
        $img = base64_decode($request->input('imagen'));
        $image_name = $request->nombre;

        $path = public_path() . "\\" . "images" . "\\" . "$image_name.jpg";
        file_put_contents($path, $img);

        // $marcas = new Marca();
        // $marcas->nombre = $request->nombre;
        // $marcas->save();

        // return $marcas;
        return 'OK';
    }

    public function show(Marca $marca)
    {
    }

    public function update(Request $request, $id)
    {
        $nombre = $request->get('nombre');
        $marca = Marca::find($id);

        $marca->nombre = $nombre;
        $marca->update();
        return $marca;
    }

    public function destroy($id)
    {
        $marcas = Marca::find($id);
        if (is_null($marcas)) {
            return response()->json('No se completó la operación', 404);
        }
        $marcas->delete();
        return response()->noContent();
    }


    // public function updateImage(Request $request)
    // {

    //     $imageName = $this->randomImageName();
    //     $fullPath = public_path('/uploaded/' . $imageName);

    //     $image = $request->image;  // base64 encoded
    //     $imageContent = $this->imageBase64Content($image);

    //     File::put($fullPath, $imageContent);

    //     $user->photo = $imageName;
    //     $user->save();

    //     return $user;
    // }
}
