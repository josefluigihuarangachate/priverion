<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
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

class UsuariosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        $usuario = inputs($request->input('usuario'));
        $clave = inputs($request->input('clave'));

        if (
                $usuario &&
                $clave
        ) {
            $usuarios = DB::table('usuario')
                    ->select(
                            'id as atr_idusuario',
                            'nombre as atr_nombre',
                            'apellido as atr_apellido',
                            'correo as atr_correo',
                            'usuario as atr_usuario',
                            'contrasenia as atr_clave',
                            'estado as atr_estado',
                    )
                    ->where(
                            [
                                ['usuario', '=', $usuario],
                            ]
                    )
                    ->limit(1)
                    ->get();
            $data = objectToArray($usuarios);

            if ($data) {

                if (
                        password_verify($clave, @$data[0]['atr_clave'])
                ) {
                    // LLENO LOS DATOS EN SESSION
                    // SESIONES - INFORMACION DEL USUARIO
                    session_start();
                    session_regenerate_id(true);
                    //session(['acceso' => true]);
                    $_SESSION['acceso'] = true;
                    session(['data' => @$data]);

                    $json = json('ok', strings('success_read'), '');
                    $json['redireccionar'] = 'productos';
                } else {
                    $json = json('error', strings('error_read'), '');
                }
            } else {
                $json = json('error', strings('error_read'), '');
            }
        } else {
            $json = json('error', strings('error_empty'), '');
        }
        return jsonPrint($json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
    }

}
