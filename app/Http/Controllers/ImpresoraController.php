<?php

namespace App\Http\Controllers;

use App\Models\Impresora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImpresoraController extends Controller
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
            $sql = DB::table('impresoras')->get();
            return $sql;
        }else{
            $sql = DB::table('impresoras')->where('np','=',$txt)->orWhere('marca','LIKE',"%{$txt}%")->orWhere('modelo','LIKE',"%{$txt}%")->get();
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
     * @param  \App\Models\Impresora  $impresora
     * @return \Illuminate\Http\Response
     */
    public function show(Impresora $impresora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Impresora  $impresora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impresora $impresora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Impresora  $impresora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impresora $impresora)
    {
        //
    }
}
