<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;


class CtController extends Controller
{
    public function index()
    {

        $filesystem = Storage::disk('ftp');

        $contents = $filesystem->get('catalogo_xml/productos.json');

        return $contents;
    }
}