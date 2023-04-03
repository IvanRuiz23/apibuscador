<?php

namespace App\Http\Controllers;

use App\Models\Pantalla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PantallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $txt = $request->text;
        if ($txt == '' || is_null($txt) == True) {
            $sql = DB::table('pantallas')->get();
            return $sql;
        }else{
            $sql = DB::table('pantallas')->where('np','=',$txt)->orWhere('marca','LIKE',"%{$txt}%")->orWhere('modelo','LIKE',"%{$txt}%")->get();
            return $sql;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pantalla  $pantalla
     * @return \Illuminate\Http\Response
     */
    public function show(Pantalla $pantalla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pantalla  $pantalla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pantalla $pantalla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pantalla  $pantalla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pantalla $pantalla)
    {
        //
    }
}
