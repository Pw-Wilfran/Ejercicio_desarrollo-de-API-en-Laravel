<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Faker\Calculator\Inn;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class MensajeApiController extends Controller
{
    public function index(){
        $mensajes = Mensaje::all();
        return response()->json($mensajes);
    }

    public function store(Request $request){
        $mensaje = Mensaje::create([
            'contenido' => $request->contenido,
            'fecha_envio'=> $request->fecha_envio,
            'hora_envio' => $request->hora_envio,
            'id_remitente' => $request->id_remitente,
            'id_destinatario' => $request->id_destinatario,
            'estado' => $request->estado,
        ]);
        return response()->json($mensaje);
    }

    public function update(Request $request, int $id){
        $mensaje = Mensaje::where('id', $id)->update([
            'contenido' => $request->contenido,
            'fecha_envio'=> $request->fecha_envio,
            'hora_envio' => $request->hora_envio,
            'id_remitente' => $request->id_remitente,
            'id_destinatario' => $request->id_destinatario,
            'estado' => $request->estado,
        ]);
        return response()->json($mensaje);
    }

    public function delete(int $id){
        $mensaje = Mensaje::where('id', $id)->delete();
        return response()->json($mensaje);
    }
}
