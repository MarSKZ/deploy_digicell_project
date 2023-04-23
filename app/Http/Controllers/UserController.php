<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Caja;
//use Illuminate\Http\Requests\LoginFormRequest;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::where('estado',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User(); //Crear el modelo Marca, crear un objeto, tabla marcas
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save(); //save() sirve para guardar
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->caja = $user->Caja;//la propiedad caja reemplaza la relación
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->username = $request->username;
        if(isset($request->password)){
            if(!empty($request->password)){
                $user->password = Hash::make($request->password);
            }
        }
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->estado = 0;
        $user->save();
        return $user;
    }

    public function login(LoginFormRequest $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],false)){//Auth se encarga de encriptar y validar
            //se le pone false para que la sesión no lo recuerde
            $user = Auth::user();
            $caja = $user->Caja;
            if(empty($caja)){

                $caja_nueva = new Caja();
                $caja_nueva->user_id = $user->id;
                $caja_nueva->estado = 1;
                $caja_nueva->save();
                
                $user->caja_id = $caja_nueva->id;

                return $user;
            }
            $user->caja_id = $caja->id; //creando nueva propiedad en user
            return $user;
        }else{//si no se valida correctamente
            return response()->json(['errors'=>['login'=>['Los datos no son válidos']]]);
        }
    }
}
