<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class LinkController extends Controller
{

    public function index(Request $request)
    {
        $txt = $request->get('txt');
        $link = Link::status()
            ->ofSearch($txt)
            ->get();
      
        return $link;
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'descripcion' => 'required',
            'url' => 'required',
        ]);

        $link = new Link;

        $link->marca = $request->marca;
        $link->descripcion = $request->descripcion;
        $link->link = $request->url;
        $link->save();
        return $link;
    }

    public function show()
    {
        
    }

    public function update(Request $request, Link $link, $id)
    {
        $request->validate([
            'marca' => 'required',
            'descripcion' => 'required',
            'url' => 'required'
        ]);

        $link = Link::find($id);

        $link->marca = $request->marca;
        $link->descripcion = $request->descripcion;
        $link->link = $request->url;

        $link->update();
        return $link;
    }

    public function off($id)
    {

        $link = Link::find($id);

        $link->update([
            'estatus' => 'OFF'
        ]);
        return $link;
    }

    public function on($id)
    {

        $link = Link::find($id);

        $link->update([
            'estatus' => 'ON'
        ]);
        return $link;
    }
    
    public function cva(Request $request)
    {
        $cliente = $request->get('cliente');
        $clave = $request->get('clave');
        $query = $request->get('query');
        $respose = Http::get('www.grupocva.com/catalogo_clientes_xml/lista_precios.xml', [
            'cliente' => $cliente,
            $query => $clave,
            'sucursales'=>'1',
            'TotalSuc'=>'1',
            'MonedaPesos'=>'1',
            'promos'=>'1'
        ]);

        return $respose;
    }
}
