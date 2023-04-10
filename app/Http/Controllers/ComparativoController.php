<?php

namespace App\Http\Controllers;
use App\Models\Comparativos;
use App\Models\Impresora;
use App\Models\Laptop;
use App\Models\Monitor;
use App\Models\Pantalla;
use App\Models\Pc;
use App\Models\Proyector;
use App\Models\Scanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComparativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $txt = $request->text;
        if ($txt == '' || is_null($txt) == True) {
            return Comparativos::all('id','nombre','mejor','comparador');

        }else{
            $sql = DB::table('comparativos')->select('id','nombre','mejor','comparador')->where('nombre','LIKE',"%{$txt}%")->get();
            return $sql;
        }
    }

    public function busqimpresoras(Request $request)
    {
        $id = $request->id;
        $sql = DB::table("impresoras")->select(
            'np',
            'marca',
            'modelo',
            'color',
            'timpresion',
            'vimpresion',
            'rimpresion',
            'ctmensual',
            'idoblecara',
            'emultiprop',
            'centrada',
            'csalida',
            'simpresion',
            'puertos',
            'conectividad',
            'cso',
            'sincluido',
            'ccaja',
            'certificacion',
            'garantia')->where('id_comparativos','=',"{$id}")->get();
            return $sql;
    }

    public function busqlaptops(Request $request)
    {
        $id = $request->id;
        $sql = DB::table("laptops")->select(
            'np',
            'marca',
            'modelo',
            'procesador',
            'graficos',
            'ram',
            'maxmemoria',
            'almacenamiento',
            'audio',
            'altavoces',
            'camara',
            'microfono',
            'bateria',
            'lbateria',
            'acorriente',
            'pantalla',
            'touch',
            'teclado',
            'dimensiones',
            'peso',
            'so',
            'ethernet',
            'wlanbt',
            'puertos',
            'seguridad',
            'huella',
            'certificados',
            'pruebmil',
            'garantia')->where('id_comparativos','=',"{$id}")->get();
            return $sql;
    }

    public function busqmonitores(Request $request)
    {
        $id = $request->id;
        $sql = DB::table("monitores")->select(
            'np',
            'marca',
            'modelo',
            'tpantalla',
            'tareaactiva',
            'panel',
            'raspecto',
            'resolucion',
            'avisualizacion',
            'trespuesta',
            'colores',
            'facttualizacion',
            'brillo',
            'contraste',
            'gcolores',
            'antirreflejante',
            'curvatura',
            'inclinacion',
            'camara',
            'microfono',
            'altavoces',
            'touch',
            'cenergia',
            'alimentacion',
            'aenergia',
            'dimensiones',
            'peso',
            'certificaciones',
            'soc',
            'puertos',
            'accesorios',
            'garantia')->where('id_comparativos','=',"{$id}")->get();
            return $sql;
    }

    public function busqpantallas(Request $request)
    {
        $id = $request->id;
        $sql = DB::table("pantallas")->select(
            'np',
            'marca',
            'modelo',
            'tpantalla',
            'resolucion',
            'luzfondo',
            'pqi',
            'hdmi',
            'colores',
            'avisualizacion',
            'altavoces',
            'psalida',
            'audiobt',
            'codecaudio',
            'so',
            'tdigital',
            'sanalogico',
            'falimentacion',
            'cenergia',
            'puertos',
            'conectividad',
            'accesorios',
            'certificacion',
            'garantia')->where('id_comparativos','=',"{$id}")->get();
            return $sql;
    }

    public function busqpcs(Request $request)
    {
        $id = $request->id;
        $sql = DB::table("pcs")->select(
            'np',
            'marca',
            'modelo',
            'procesador',
            'graficos',
            'memoriaintegrada',
            'slotmemoria',
            'memoriamax',
            'storage',
            'lectorsd',
            'uniopt',
            'audio',
            'wlanbt',
            'teclado',
            'altavoz',
            'energia',
            'dimension',
            'peso',
            'puertos',
            'certific',
            'pruebmil',
            'so',
            'garantia')->where('id_comparativos','=',"{$id}")->get();
            return $sql;
    }

    public function busqproyectores(Request $request)
    {
        $id = $request->id;
        $sql = DB::table("proyectores")->select(
            'np',
            'marca',
            'modelo',
            'sisproy',
            'lumens',
            'resnativ',
            'resaspnativ',
            'contraste',
            'color',
            'fluz',
            'vidaluz',
            'interfaces',
            'audio',
            'faliment',
            'cenergia',
            'ruido',
            'accesor',
            'dimensiones',
            'peso',
            'dproyeccion',
            'seguridad',
            'keystone',
            'zoom',
            'tempoper',
            'lente',
            'certificaciones',
            'garantia')->where('id_comparativos','=',"{$id}")->get();
            return $sql;
    }

    public function busqscanners(Request $request)
    {
        $id = $request->id;
        $sql = DB::table("scanners")->select(
            'np',
            'marca',
            'modelo',
            'digitalizador',
            'sensor',
            'roptica',
            'fluz',
            'rescaneo',
            'ecolor',
            'vescaneo',
            'adf',
            'ctrabajo',
            'voltaje',
            'cenergia',
            'software',
            'osc',
            'calimentador',
            'formatos',
            'twain',
            'salimentador',
            'conectividad',
            'puertos',
            'ccaja',
            'certificacion',
            'garantia')->where('id_comparativos','=',"{$id}")->get();
            return $sql;
    }

    public function guardarImpresora(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nombre'=>'required'
            ]);
            $nomtabla = $request->nombre;
            $compexis = DB::select('select * from comparativos where nombre = :nom', ['nom'=>$nomtabla]);
            if($compexis==[]){
                $comparativo = Comparativos::create([
                    'nombre'=> $request->nombre,
                    'mejor'=>$request->mejor,
                    'comparador'=> $request->comparador,
                ]);
                $isjson = $request->datos;
                $tojson = json_decode($isjson,true);
                foreach($tojson as $imp){
                    $impresora = Impresora::create([
                    'id_comparativos' => $comparativo->id,
                    'np' => $imp['np'],
                    'marca' => $imp['marca'],
                    'modelo' => $imp['modelo'],
                    'color' => $imp['color'],
                    'timpresion' => $imp['tImpresion'],
                    'vimpresion' => $imp['vImpresion'],
                    'rimpresion' => $imp['rImpresion'],
                    'ctmensual' => $imp['ctMensual'],
                    'idoblecara' => $imp['iDobleCara'],
                    'emultiprop' => $imp['eMultiprop'],
                    'centrada' => $imp['cEntrada'],
                    'csalida' => $imp['cSalida'],
                    'simpresion' => $imp['sImpresion'],
                    'puertos' => $imp['puertos'],
                    'conectividad' => $imp['conectividad'],
                    'cso' => $imp['cSO'],
                    'sincluido' => $imp['sIncluido'],
                    'ccaja' => $imp['cCaja'],
                    'certificacion' => $imp['certificacion'],
                    'garantia' => $imp['garantia']
                    ]);
                }
                DB::commit();
                return response('Completado',200);
            } else {
                return response('Ya existe una comparativa con este nombre',200 );
            }
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e->getMessage());
            // return $e->getMessage();
            return response('Ocurrió un error al agregar la información',500);
        }
    }

    public function guardarLaptop(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nombre'=>'required'
            ]);
            $nomtabla = $request->nombre;
            $compexis = DB::select('select * from comparativos where nombre = :nom', ['nom'=>$nomtabla]);
            if($compexis==[]){
                $comparativo = Comparativos::create([
                    'nombre'=> $request->nombre,
                    'mejor'=>$request->mejor,
                    'comparador'=> $request->comparador,
                ]);
                $isjson = $request->datos;
                $tojson = json_decode($isjson,true);
                foreach($tojson as $laptop){
                    $impresora = Laptop::create([
                    'id_comparativos' => $comparativo->id,
                    'np'=>$laptop['np'],
                    'marca'=>$laptop['marca'],
                    'modelo'=>$laptop['modelo'],
                    'procesador'=>$laptop['procesador'],
                    'graficos'=>$laptop['graficos'],
                    'ram'=>$laptop['ram'],
                    'maxmemoria'=>$laptop['maxmemoria'],
                    'almacenamiento'=>$laptop['almacenamiento'],
                    'audio'=>$laptop['audio'],
                    'altavoces'=>$laptop['altavoces'],
                    'camara'=>$laptop['camara'],
                    'microfono'=>$laptop['microfono'],
                    'bateria'=>$laptop['bateria'],
                    'lbateria'=>$laptop['lBateria'],
                    'acorriente'=>$laptop['aCorriente'],
                    'pantalla'=>$laptop['pantalla'],
                    'touch'=>$laptop['touch'],
                    'teclado'=>$laptop['teclado'],
                    'dimensiones'=>$laptop['dimensiones'],
                    'peso'=>$laptop['peso'],
                    'so'=>$laptop['so'],
                    'ethernet'=>$laptop['ethernet'],
                    'wlanbt'=>$laptop['wlanBt'],
                    'puertos'=>$laptop['puertos'],
                    'seguridad'=>$laptop['seguridad'],
                    'huella'=>$laptop['huella'],
                    'certificados'=>$laptop['certificados'],
                    'pruebmil'=>$laptop['pruebMil'],
                    'garantia'=>$laptop['garantia']
                    ]);
                }
                DB::commit();
                return response('Completado',200);
            } else {
                return response('Ya existe una comparativa con este nombre',200 );
            }
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e->getMessage());
            // return $e->getMessage();
            return response('Ocurrió un error al agregar la información',500);
        }
    }

    public function guardarMonitor(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nombre'=>'required'
            ]);
            $nomtabla = $request->nombre;
            $compexis = DB::select('select * from comparativos where nombre = :nom', ['nom'=>$nomtabla]);
            if($compexis==[]){
                $comparativo = Comparativos::create([
                    'nombre'=> $request->nombre,
                    'mejor'=>$request->mejor,
                    'comparador'=> $request->comparador,
                ]);
                $isjson = $request->datos;
                $tojson = json_decode($isjson,true);
                foreach($tojson as $monitor){
                    $impresora = Monitor::create([
                    'id_comparativos' => $comparativo->id,
                    'np'=>$monitor['np'],
                    'marca'=>$monitor['marca'],
                    'modelo'=>$monitor['modelo'],
                    'tpantalla'=>$monitor['tPantalla'],
                    'tareaactiva'=>$monitor['tAreaActiva'],
                    'panel'=>$monitor['panel'],
                    'raspecto'=>$monitor['rAspecto'],
                    'resolucion'=>$monitor['resolucion'],
                    'avisualizacion'=>$monitor['aVisualizacion'],
                    'trespuesta'=>$monitor['tRespuesta'],
                    'colores'=>$monitor['colores'],
                    'facttualizacion'=>$monitor['fActualizacion'],
                    'brillo'=>$monitor['brillo'],
                    'contraste'=>$monitor['contrasteE'],
                    'gcolores'=>$monitor['gColores'],
                    'antirreflejante'=>$monitor['antirreflejante'],
                    'curvatura'=>$monitor['curvatura'],
                    'inclinacion'=>$monitor['inclinacion'],
                    'camara'=>$monitor['camara'],
                    'microfono'=>$monitor['microfono'],
                    'altavoces'=>$monitor['altavoces'],
                    'touch'=>$monitor['touch'],
                    'cenergia'=>$monitor['cEnergia'],
                    'alimentacion'=>$monitor['alimentacion'],
                    'aenergia'=>$monitor['aEnergia'],
                    'dimensiones'=>$monitor['dimensiones'],
                    'peso'=>$monitor['peso'],
                    'certificaciones'=>$monitor['certificaciones'],
                    'soc'=>$monitor['soC'],
                    'puertos'=>$monitor['puertos'],
                    'accesorios'=>$monitor['accesorios'],
                    'garantia'=>$monitor['garantia']
                    ]);
                }
                DB::commit();
                return response('Completado',200);
            } else {
                return response('Ya existe una comparativa con este nombre',200 );
            }
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e->getMessage());
            // return $e->getMessage();
            return response('Ocurrió un error al agregar la información',500);
        }
    }

    public function guardarPantalla(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nombre'=>'required'
            ]);
            $nomtabla = $request->nombre;
            $compexis = DB::select('select * from comparativos where nombre = :nom', ['nom'=>$nomtabla]);
            if($compexis==[]){
                $comparativo = Comparativos::create([
                    'nombre'=> $request->nombre,
                    'mejor'=>$request->mejor,
                    'comparador'=> $request->comparador,
                ]);
                $isjson = $request->datos;
                $tojson = json_decode($isjson,true);
                foreach($tojson as $pantalla){
                    $impresora = Pantalla::create([
                    'id_comparativos' => $comparativo->id,
                    'np'=>$pantalla['np'],
                    'marca'=>$pantalla['marca'],
                    'modelo'=>$pantalla['modelo'],
                    'tpantalla'=>$pantalla['tPantalla'],
                    'resolucion'=>$pantalla['resolucion'],
                    'luzfondo'=>$pantalla['luzFondo'],
                    'pqi'=>$pantalla['pqi'],
                    'hdmi'=>$pantalla['hdmi'],
                    'colores'=>$pantalla['colores'],
                    'avisualizacion'=>$pantalla['aVisualizacion'],
                    'altavoces'=>$pantalla['altavoces'],
                    'psalida'=>$pantalla['pSalida'],
                    'audiobt'=>$pantalla['audioBT'],
                    'codecaudio'=>$pantalla['codecAudio'],
                    'so'=>$pantalla['so'],
                    'tdigital'=>$pantalla['tDigital'],
                    'sanalogico'=>$pantalla['sAnalogico'],
                    'falimentacion'=>$pantalla['fAlimentacion'],
                    'cenergia'=>$pantalla['cEnergia'],
                    'puertos'=>$pantalla['puertos'],
                    'conectividad'=>$pantalla['conectividad'],
                    'accesorios'=>$pantalla['accesorios'],
                    'certificacion'=>$pantalla['certificacion'],
                    'garantia'=>$pantalla['garantia']
                    ]);
                }
                DB::commit();
                return response('Completado',200);
            } else {
                return response('Ya existe una comparativa con este nombre',200 );
            }
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e->getMessage());
            // return $e->getMessage();
            return response('Ocurrió un error al agregar la información',500);
        }
    }

    public function guardarPc(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nombre'=>'required'
            ]);
            $nomtabla = $request->nombre;
            $compexis = DB::select('select * from comparativos where nombre = :nom', ['nom'=>$nomtabla]);
            if($compexis==[]){
                $comparativo = Comparativos::create([
                    'nombre'=> $request->nombre,
                    'mejor'=>$request->mejor,
                    'comparador'=> $request->comparador,
                ]);
                $isjson = $request->datos;
                $tojson = json_decode($isjson,true);
                foreach($tojson as $pc){
                    $impresora = Pc::create([
                    'id_comparativos' => $comparativo->id,
                    'np'=>$pc['np'],
                    'marca'=>$pc['marca'],
                    'modelo'=>$pc['modelo'],
                    'procesador'=>$pc['procesador'],
                    'graficos'=>$pc['graficos'],
                    'memoriaintegrada'=>$pc['memoriaIntegrada'],
                    'slotmemoria'=>$pc['slotMemoria'],
                    'memoriamax'=>$pc['memoriaMax'],
                    'storage'=>$pc['storage'],
                    'lectorsd'=>$pc['lectorSD'],
                    'uniopt'=>$pc['uniOpt'],
                    'audio'=>$pc['audio'],
                    'wlanbt'=>$pc['wlanBT'],
                    'teclado'=>$pc['teclado'],
                    'altavoz'=>$pc['altavoz'],
                    'energia'=>$pc['energia'],
                    'dimension'=>$pc['dimension'],
                    'peso'=>$pc['peso'],
                    'puertos'=>$pc['puertos'],
                    'certific'=>$pc['certific'],
                    'pruebmil'=>$pc['pruebMil'],
                    'so'=>$pc['so'],
                    'garantia'=>$pc['garantia']
                    ]);
                }
                DB::commit();
                return response('Completado',200);
            } else {
                return response('Ya existe una comparativa con este nombre',200 );
            }
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e->getMessage());
            // return $e->getMessage();
            return response('Ocurrió un error al agregar la información',500);
        }
    }

    public function guardarProyector(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nombre'=>'required'
            ]);
            $nomtabla = $request->nombre;
            $compexis = DB::select('select * from comparativos where nombre = :nom', ['nom'=>$nomtabla]);
            if($compexis==[]){
                $comparativo = Comparativos::create([
                    'nombre'=> $request->nombre,
                    'mejor'=>$request->mejor,
                    'comparador'=> $request->comparador,
                ]);
                $isjson = $request->datos;
                $tojson = json_decode($isjson,true);
                foreach($tojson as $proyector){
                    $impresora = Proyector::create([
                    'id_comparativos' => $comparativo->id,
                    'np'=>$proyector['np'],
                    'marca'=>$proyector['marca'],
                    'modelo'=>$proyector['modelo'],
                    'sisproy'=>$proyector['sisProy'],
                    'lumens'=>$proyector['lumens'],
                    'resnativ'=>$proyector['resNativ'],
                    'resaspnativ'=>$proyector['resAspNativ'],
                    'contraste'=>$proyector['contraste'],
                    'color'=>$proyector['color'],
                    'fluz'=>$proyector['fLuz'],
                    'vidaluz'=>$proyector['vidaLuz'],
                    'interfaces'=>$proyector['interfaces'],
                    'audio'=>$proyector['audio'],
                    'faliment'=>$proyector['fAliment'],
                    'cenergia'=>$proyector['cEnergia'],
                    'ruido'=>$proyector['ruido'],
                    'accesor'=>$proyector['accesor'],
                    'dimensiones'=>$proyector['dimensiones'],
                    'peso'=>$proyector['peso'],
                    'dproyeccion'=>$proyector['dProyeccion'],
                    'seguridad'=>$proyector['seguridad'],
                    'keystone'=>$proyector['keystone'],
                    'zoom'=>$proyector['zoom'],
                    'tempoper'=>$proyector['tempOper'],
                    'lente'=>$proyector['lente'],
                    'certificaciones'=>$proyector['certificaciones'],
                    'garantia'=>$proyector['garantia']
                    ]);
                }
                DB::commit();
                return response('Completado',200);
            } else {
                return response('Ya existe una comparativa con este nombre',200 );
            }
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e->getMessage());
            // return $e->getMessage();
            return response('Ocurrió un error al agregar la información',500);
        }
    }

    public function guardarScanner(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nombre'=>'required'
            ]);
            $nomtabla = $request->nombre;
            $compexis = DB::select('select * from comparativos where nombre = :nom', ['nom'=>$nomtabla]);
            if($compexis==[]){
                $comparativo = Comparativos::create([
                    'nombre'=> $request->nombre,
                    'mejor'=>$request->mejor,
                    'comparador'=> $request->comparador,
                ]);
                $isjson = $request->datos;
                $tojson = json_decode($isjson,true);
                foreach($tojson as $scanner){
                    $impresora = Scanner::create([
                    'id_comparativos' => $comparativo->id,
                    'np'=>$scanner['np'],
                    'marca'=>$scanner['marca'],
                    'modelo'=>$scanner['modelo'],
                    'digitalizador'=>$scanner['digitalizador'],
                    'sensor'=>$scanner['sensor'],
                    'roptica'=>$scanner['rOptica'],
                    'fluz'=>$scanner['fLuz'],
                    'rescaneo'=>$scanner['rEscaneo'],
                    'ecolor'=>$scanner['eColor'],
                    'vescaneo'=>$scanner['vEscaneo'],
                    'adf'=>$scanner['adf'],
                    'ctrabajo'=>$scanner['cTrabajo'],
                    'voltaje'=>$scanner['voltaje'],
                    'cenergia'=>$scanner['cEnergia'],
                    'software'=>$scanner['software'],
                    'osc'=>$scanner['osC'],
                    'calimentador'=>$scanner['cAlimentador'],
                    'formatos'=>$scanner['formatos'],
                    'twain'=>$scanner['twain'],
                    'salimentador'=>$scanner['sAlimentador'],
                    'conectividad'=>$scanner['conectividad'],
                    'puertos'=>$scanner['puertos'],
                    'ccaja'=>$scanner['cCaja'],
                    'certificacion'=>$scanner['certificacion'],
                    'garantia'=>$scanner['garantia']
                    ]);
                }
                DB::commit();
                return response('Completado',200);
            } else {
                return response('Ya existe una comparativa con este nombre',200);
            }
        } catch (\Exception $e) {
            DB::rollback();
            // return $e->getMessage();
            return response('Ocurrió un error al agregar la información',500);
        }
    }
}
