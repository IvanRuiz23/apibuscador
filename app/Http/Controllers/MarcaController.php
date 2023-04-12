<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Support\Facades\Storage;
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
        $nombre = $request->nombre;
        $img = $request->file('imagen')->move(public_path('images'),"$nombre.jpg");
        $marcas = new Marca();
        $marcas->nombre = $nombre;
        $marcas->save();

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

    public function imagenUpload(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $base64_string = $request->input('imagen');
        $nombre = $request->nombre;

        $image = base64_decode($base64_string);
        $filename = "$nombre.png";

        Storage::put('images/' . $filename, $image);
    }
}
