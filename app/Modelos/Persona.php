<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class Persona extends Model
{
    
    public function insertar(Request $request){
       
        $persona = new \App\Modelos\Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->sexo = $request->sexo;
        $persona->edad = $request->edad;  

        if ($persona->save())
            return response()->json($persona,202);
            return response()->json(null,422);
        
    }

}
