<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CtController extends Controller
{
    public function index()
    {
        $response = Http::post('http://connect.ctonline.mx:3001/cliente/token',[
            'email'=>'rcelis@tecnologiaintegrada.com.mx',
            'cliente'=>'GDL1351',
            'rfc'=>'ATI030129753'
        ]);
        return $response;
    }
}
