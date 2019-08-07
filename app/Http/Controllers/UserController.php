<?php

namespace App\Http\Controllers;

use App\User;
use App\Producto;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        //necesario solo para llamar funciones especificas del modelo
        //Las funciones especificas son las que requieran condigo mas especifico y extenso
        $this->user = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(10);
        return view('users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $usuarios = User::orderBy('name')->get();
        return view('users.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());

        if( $user->save() ){
            return response()->json([
                    'message'   => 'Usuario creado',
                ], 200);
        }

        return response()->json([
                    'message'   => 'No se pudo guardar el usuario',
                ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('users.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        //
    }

    public function verifyEmail(Request $request)
    {
        return response()->json(User::where('email', $request->email)->doesntExist());
    }
}
