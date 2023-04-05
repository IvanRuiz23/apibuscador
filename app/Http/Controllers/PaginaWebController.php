<?php

namespace App\Http\Controllers;

use App\Models\PaginaWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaWebController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(PaginaWeb $paginaWeb)
    {
        //
    }

    public function update(Request $request, PaginaWeb $paginaWeb)
    {
        //
    }

    public function destroy(PaginaWeb $paginaWeb)
    {
        //
    }


    public function links(Request $request)
    {
        $txt = $request->text;
        if ($txt == '' || is_null($txt) == True) {
            return PaginaWeb::all('id','titulo','link','activo');
        }else{
            $sql = DB::table('paginasweb')->where('titulo','LIKE',"%{$txt}%")->get();
            return $sql;
        }


    }

    public function guardar(Request $request)
    {
        $id = $request->id;
        $titulo = $request->titulo;
        $link = $request->link;
        $activo = $request->activo;
        if($id==''|| is_null($id) == True){
            $existe = DB::select('select * from paginasweb where titulo = :nom', ['nom'=>$titulo]);
            if(count($existe)==0){
                DB::table('paginasweb')->insert([
                    'titulo'=>$titulo,
                    'link'=>$link,
                    'activo'=>$activo
                ]);
                return response('Guardado',200);
            }else{
                return response('Existe',200);
            }
        }{
            DB::table('paginasweb')->where('id',$id)->update(['titulo'=>$titulo,'link'=>$link,'activo'=>$activo]);
            return response('Actualizado',200);
        }

    }
}


