<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

class usuario extends Controller{

    function compruebaLogin(Request $request){
        $user = trim($request->nombre);
        $password = $request->password;

        $usuario = DB::table('usuarios')->
                   where('nombre','=',$user)->
                   select('*')->
                   get();
        if(count($usuario) < 0){
            header('location: /login');
        }
        $usuario = $usuario[0];
        if($password == $usuario->password){
            echo "bien";
            header( "refresh:2;url=/" );
            setcookie("DWS", $usuario->id_usuario . ";" . $usuario->nombre,  time() + (86400 * 7));
            return response('')->cookie('DWS',$usuario->nombre . ';' . $usuario->password);;
        }
        else{
            echo "explosion";
            header( "refresh:2;url=/login" );
        }
    }

}
