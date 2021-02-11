<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }    

    public function borrar(Request $request){
        try {
            DB::table('notes')->where('id', '=', $request->input('id'))->delete();
            return response()->json(array('resultado'=>'OK'), 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }

    public function modificar($id, request $request){
        $notes=$request->except('_token','_method','Enviar');
        DB::table('notes')->where('id', '=', $id)->update($notes);
        $notes = DB::table('notes')->get();
        return view('home', compact('notes'));
    }  

    public function actualizar($id){
        $notes= DB::table('notes')->where('id', '=', $id)->first();
        //Enviar los datos del alumno a la vista
        return view('actualizar',compact('notes'));
    }

    public function crear(Request $request){   
        $notas=$request->except('_token');
        try {
            DB::table('notes')->insertGetId(['title'=>$notas['title'],'description'=>$notas['description']]);
            return response()->json(array('resultado'=>'OK'), 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }

    public function mostrar(){
        $notes = DB::table('notes')->get();
        return view('home', compact('notes'));
    }

    public function read(){
        $datos = DB::table('notes')->get();
        return response()->json($datos, 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
