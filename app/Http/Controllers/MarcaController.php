<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    
    public function index()
    {
        return Marca::all('nombre');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $marcas = new Marca();
        $marcas->nombre = $request->nombre;
        $marcas->save();

        return $marcas;
    }
   
    public function show(Marca $marca)
    {
          
    }
   
    public function update(Request $request, Marca $marca, $id)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $marca = Marca::find($id);

        $marca->nambre = $request->name;
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
}
