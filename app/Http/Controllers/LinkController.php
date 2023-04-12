<?php

namespace App\Http\Controllers;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class LinkController extends Controller
{

    public function index(Request $request)
    {
        $txt1 = $request->txt;
        $txt2 = $request->estatus;
        $marca = $request->marca;
        if($txt2=='OFF'){
            $sql = DB::table('links')->where('estatus', '=', $txt2)->get();
            return $sql;
        }else{
            if($txt1 != '' && is_null($txt1)==false){
                $sql = DB::table('links')->where('estatus', '=', $txt2)->where('descripcion', 'LIKE', '%' . $txt1 . '%')->where('marca','=',$marca)->get();
                return $sql;
            }else{
                $sql = DB::table('links')->where('marca','=',$marca)->where('estatus', '=', $txt2)->get();
                return $sql;
            }
        }
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
            'descripcion' => 'required',
            'url' => 'required'
        ]);

        $link = Link::find($id);

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
