<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CtController extends Controller
{
    public function index()
    {
        $ftp = Storage::createFtpDriver([
            'host'=>'216.70.82.104',
            'username'=>'GDL1351',
            'password'=>'j2U2QAPRm6elUvtMGskd',
            'root'=>'/catalogo_xml'
        ]);
        $file = $ftp->get('productos.json');
        return $file;
        // $response = Http::post('http://connect.ctonline.mx:3001/cliente/token',[
        //     'email'=>'rcelis@tecnologiaintegrada.com.mx',
        //     'cliente'=>'GDL1351',
        //     'rfc'=>'ATI030129753'
        // ]);
        // $art = Http::withHeaders([
        //     'x-auth'=>$response['token']
        // ])->get('http://connect.ctonline.mx:3001/existencia/promociones');
        // return $art;
    }
}
