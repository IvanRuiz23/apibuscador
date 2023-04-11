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

        //get image
        $img = base64_decode($request->input('imagen'));
        $image_name = $request->nombre;

        $path = public_path() . "\\" . "images" . "\\" . "$image_name.jpg'";
        file_put_contents($path, $img);

        $marcas = new Marca();
        $marcas->nombre = $request->nombre;
        $marcas->save();

        return $marcas;
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


    // public function stores(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $imageName = time() . '.' . $request->image->extension();

    //     $request->image->move(public_path('images'), $imageName);

    //     return back()
    //         ->with('success', 'You have successfully upload image.')
    //         ->with('image', $imageName);
    // }
}
