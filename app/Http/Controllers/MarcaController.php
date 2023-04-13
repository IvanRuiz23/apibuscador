<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use File;

class MarcaController extends Controller
{

    public function index()
    {
        return Marca::all('id', 'nombre', 'direccion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $nombre = $request->nombre;
        $img = $request->file('imagen')->move(public_path('images'), "$nombre.jpg");
        $link = asset("images/$nombre.jpg");
        $marcas = new Marca();
        $marcas->nombre = $nombre;
        $marcas->direccion = $link;
        $marcas->save();

        return 'OK';
    }

    public function show(Marca $marca)
    {
    }

    public function update(Request $request, $id)
    {
        $nombre = $request->nombre;
        $marca = Marca::find($id);
        $nombredel = $marca->nombre;
        $marca->nombre = $nombre;
        if($request->file('imagen')!=NULL){
            File::delete(public_path("images/$nombredel.jpg"));
            $img = $request->file('imagen')->move(public_path('images'), "$nombre.jpg");
            $link = asset("images/$nombre.jpg");
            $marca->direccion = $link;

        }
        $marca->update();
        return $marca;
    }

    public function destroy($id)
    {
        $marcas = Marca::find($id);
        $nombre = $marcas->nombre;
        if (is_null($marcas)) {
            return response()->json('No se completó la operación', 404);
        }
        File::delete(public_path("images/$nombre.jpg"));
        // unlink("/public/images/$nombre.jpg");
        $marcas->delete();
        return response()->noContent();
    }
}
