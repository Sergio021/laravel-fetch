<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\usuarios;
use Session;


class UsuariosController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function autenticar(Request $request){
        
        $consulta = usuarios::where('correo', $request->email)->get();
        $cantidad = count($consulta);
        if ($cantidad == 1 && hash::check($request->password, $consulta[0]->password)) {

            Session::put('sesionUsuario',$consulta[0]->nombre.' '.$consulta[0]->app.' '.$consulta[0]->apm);
            Session::put('tipoSesion',$consulta[0]->type);
            Session::put('idUsuario',$consulta[0]->id_Usuario);
            return response()->json([
                'error' => false,
                'mensaje' => 'Todo bien, todo correcto',
            ]);
        }
        else{
            //Session::flash('mensaje', "La información no es valida");
            return response()->json([
                'error' => true,
                'mensaje' => 'Los datos no son validos.',
            ]);
        }
        
    }
    
    public function usuarios(){

        if (session('sesionUsuario')!= "") {
            return view('contenido.usuarios');
        }
        else{
            Session::flash('mensaje', "Inicie sesión para continuar");
            return redirect()->route('index');
        }
    }

    public function listar(){
        $usuarios = usuarios::all();
        return response()->json([
            'error' => false,
            'users' => $usuarios
        ]);
    }
    
    public function agregar(Request $request){

        $password_encript = Hash::make($request->pass);

        $empData = [
            'nombre' => $request->nombre, 
            'app' => $request->app, 
            'apm' => $request->apm, 
            'telefono' => $request->telefono, 
            'fecha_nac' => $request->fecha_nac, 
            'sexo' => $request->genero,
            'type' => $request->perfil, 
            'correo' => $request->mail,
            'password' => $password_encript,
        ];

        if (usuarios::create($empData)) {
            return response()->json([
                'error' => false,
                'mensaje' => "Agregado exitosamente"
            ]);
        }
        else{
            return response()->json([
                'error' => true,
                'mensaje' => "Ocurrio un error, intentelo más tarde"
            ]);
        }
    }

    public function modificar(Request $request){
        if ($usuario = usuarios::find($request->mod_idUsuario)) {
            $empData = [
                'id' => $request->mod_idUsuario,
                'nombre' => $request->mod_nombre, 
                'app' => $request->mod_app, 
                'apm' => $request->mod_apm, 
                'telefono' => $request->mod_telefono, 
                'fecha_nac' => $request->mod_fecha_nac, 
                'sexo' => $request->mod_genero,
                'type' => $request->mod_perfil, 
                'correo' => $request->mod_mail,
            ];

            if($usuario->update($empData)){
                return response()->json([
                    'error' => false,
                    'mensaje' => "Modificado exitosamente",
                ]);
            }        
            else{
                
            }
        }
        else{
            return response()->json([
                'error' => true,
                'mensaje' => "Ocurrio un error, intentelo más tarde"
            ]);
        }
    }

    public function eliminar(Request $request){
        $id = $request->identificador;
        if($usuario = usuarios::find($id)){
            $usuario->delete();
            return response()->json([
                'error' => false,
                'mensaje' => 'Eliminado exitosamente',
            ]);
        }
        else{
            return response()->json([
                'error' => true,
                'mensaje' => 'No pudo eliminarse',
            ]);
        }
    }

    public function cerrarSesion(){
        Session::forget('sesionUsuario');
        Session::forget('tipoSesion');
        Session::forget('idUsuario');
        Session::flush();
        Session::flash('mensaje', "Sesión se ha cerrado correctamente");
        return redirect()->route('index');
    }
    
}
