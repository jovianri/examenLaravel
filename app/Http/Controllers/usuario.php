<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

class usuario extends Controller
{
    function registrarse(Request $request){
        if ($request->has('user')) {

            //comprobar que las contraseñas coinciden
            $pass1 = $request->get('password');
            $pass2 = $request->get('password2') ;
            $username = $request->get('user');
            $extension = $request->avatar->extension();
            if (strcmp($pass1, $pass2) == 0) {
                $password = password_hash($pass1, PASSWORD_DEFAULT);
                try {

                    $idUser = DB::table('usuarios')->
                               insertGetId(
                                   ['nombreusuario' => $username, 'password' => $password, 'avatar' => $extension]
                               );

                    //subir el avatar del usuario
                    $avatar = 'avatar' . $idUser . '.' . $extension;
                    $request->avatar->storeAs("avatares", $avatar);

                    header('Location: /');
                }
                catch (\PDOException $e)  {
                    if ($e->getCode() == 23000)
                        echo 'El usuario ya existe en la bbdd';
                        else
                            echo "ERROR desconocido ";
                }
            } else {
                echo "Las contraseñas no coinciden";
            }

        }
    }

    function compruebaLogin(Request $request){
        $user = trim($request->nombreusuario);
        $password = $request->password;

        $usuario = DB::table('usuarios')->
                   where('nombreusuario','=',$user)->
                   select('*')->
                   get();
        if(count($usuario) < 0){
            header('location: /login');
        }
        $usuario = $usuario[0];
        if(password_verify($password,$usuario->password)){
            echo "bien";
            header( "refresh:5;url=/" );
            return response('')->cookie('DWS',$usuario->nombreusuario . ';' . $usuario->password . ';' . $usuario->avatar);;
        }
        else{
            echo "explosion";
            header( "refresh:5;url=/login" );
        }
    }

    public function login(Request $request){
        // $credentials = $request->only('nombreusuario', 'password');
        // var_dump($credentials);
        // if ($token = $this->guard()->attempt($credentials)) {
        //     return response('')->cookie('JWS',$token);
        // }
        // return "bien intentado";
        // return response(['status' => 'success','token' => $token]);
        $time = time();
        $key = 'my_secret_key';

        $token = array(
            'iat' => $time, // Tiempo que inició el token
            'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
            'data' => [ // información del usuario
                'id' => 1,
                'name' => 'Eduardo'
            ]
        );

        $jwt = JWT::encode($token, $key);

        $data = JWT::decode($jwt, $key, array('HS256'));

        var_dump($data);
    }

    public function user(Request $request){
        $user = User::find(Auth::user()->id);
        return response(['status' => 'success','data' => $user]);
    }

    public function guard()
    {
        return Auth::guard();
    }
}
