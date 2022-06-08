<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
// Agregar 
use Auth;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View; // Nuevo
use Illuminate\Support\Facades\File; // Nuevo
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

include 'tools/string.php';
include 'tools/function.php'; // Si funciona
include 'tools/json.php'; // Si funciona
// Fin Agregar

class ProductosController extends Controller {

    public function cerrarsesion() {
        session_start();
        session_unset();
        session_destroy();
        $_SESSION = array();
        session_write_close();
        setcookie(session_name(), '', 0, '/');

        Auth::logout();
        Session::flush();

        session(['acceso' => false]);
        return redirect('/');
    }

    public function listado() {
        $data = DB::table('producto')
                ->select(
                        'id as atr_idproducto',
                        'nombre as atr_nombre',
                        'color as atr_color',
                        'stock as atr_stock',
                        'precio as atr_precio'
                )
                ->get();
        return view('productos')->with('data', $data);
    }

    public function registrar(Request $request) {
        $nombre = inputs($request->input('nombre'));
        $color = inputs($request->input('color'));
        $stock = inputs($request->input('stock'));
        $precio = inputs($request->input('precio'));

        if (
                !empty($nombre) &&
                !empty($color) &&
                !empty($stock) &&
                !empty($precio)
        ) {
            try {
                $id = DB::table('producto')->insertGetId(
                        [
                            'nombre' => $nombre,
                            'color' => $color,
                            'stock' => $stock,
                            'precio' => $precio,
                        ]
                );

                if ($id) {
                    $json = json('ok', strings('success_create'), '');
                } else {
                    $json = json('error', strings('error_create'), '');
                }
            } catch (Throwable $t) {
                $json = json('error', strings('error_create'), '');
            }
        } else {
            $json = json('error', strings('error_empty'), '');
        }
        return jsonPrint($json);
    }

    public function eliminar(Request $request) {
        $idproducto = inputs($request->input('id'));
        if (
                !empty($idproducto)
        ) {
            try {
                $deleted = DB::table('producto')->where('id', '=', $idproducto)->delete();

                if (!empty($deleted)) {
                    $json = json('ok', strings('success_delete'), '');
                } else {
                    $json = json('error', strings('error_delete'), '');
                }
            } catch (Throwable $t) {
                $json = json('error', strings('error_delete'), '');
            }
        } else {
            $json = json('error', strings('error_empty'), '');
        }

        return jsonPrint($json);
    }

    public function mostrar(Request $request) {
        $idproducto = inputs($request->input('id'));

        if (
                !empty($idproducto)
        ) {
            $producto = DB::table('producto')
                    ->select(
                            'nombre as atr_nombre',
                            'color as atr_color',
                            'stock as atr_stock',
                            'precio as atr_precio'
                    )
                    ->where('id', '=', $idproducto)
                    ->limit(1)
                    ->get();
            $data = objectToArray($producto);

            if ($data) {
                $json = json('ok', strings('success_read'), $data);
            } else {
                $json = json('error', strings('error_read'), '');
            }
        } else {
            $json = json('error', strings('error_empty'), '');
        }

        return jsonPrint($json);
    }

    public function actualizar(Request $request) {
        $id = inputs($request->input('id'));
        $nombre = inputs($request->input('nombre'));
        $color = inputs($request->input('color'));
        $stock = inputs($request->input('stock'));
        $precio = inputs($request->input('precio'));

        if (
                !empty($id) &&
                !empty($nombre) &&
                !empty($color) &&
                !empty($stock) &&
                !empty($precio)
        ) {
            try {
                $affected = DB::table('producto')
                        ->where('id', $id)
                        ->update(
                        [
                            'nombre' => $nombre,
                            'color' => $color,
                            'stock' => $stock,
                            'precio' => $precio,
                        ]
                );

                if ($affected) {
                    $json = json('ok', strings('success_update'), '');
                } else {
                    $json = json('error', strings('error_update'), '');
                }
            } catch (Throwable $t) {
                $json = json('error', strings('error_update'), '');
            }
        } else {
            $json = json('error', strings('error_empty'), '');
        }
        return jsonPrint($json);
    }

}
