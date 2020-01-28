<?php

namespace App\Http\Controllers\Prueba;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Modelos\Persona;



class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     public function index(Request $request, string $nombre, 
    string $sexo ="Masculino", int $edad){


        $color = (strtoupper($sexo) == "MASCULINO" ) ? "blue" : "pink";
    
        $datos = array(
            ["nombre" => "Luis" , "apellido_paterno" => "Mendez" , "apellido_materno" => "Ramos" , "sexo" =>"Masculino" , "edad"=>18],
            ["nombre" => "Carla" , "apellido_paterno" => "Duran" , "apellido_materno" => "Gonzalez" , "sexo" =>"Femenino" , "edad"=>16],
            ["nombre" => "Enrique" , "apellido_paterno" => "Perez" , "apellido_materno" => "Fernandez" , "sexo" =>"Masculino" , "edad"=>20],
            ["nombre" => "Luisa" , "apellido_paterno" => "Rodriguez" , "apellido_materno" => "Ramos" , "sexo" =>"Femenino" , "edad"=>17],
            ["nombre" => "Jose" , "apellido_paterno" => "Alvarado" , "apellido_materno" => "Ramos" , "sexo" =>"Masculino" , "edad"=>21],
            ["nombre" => "Juana" , "apellido_paterno" => "Villa" , "apellido_materno" => "Ramos" , "sexo" =>"Femenino" , "edad"=>22],
        );
       
        return view('prueba.prueba', ['nombre' => $nombre, 'edad' => $edad,
         "sexo" => $sexo, "color" => $color, "datos" => $datos]);

    }

    public function index2(){

        return response(Persona::all()->jsonSerialize(), Response::HTTP_OK);

    }

    // Funcion INFO

    public function info(Request $request){

        return $request->all();

            return view("info", ["nombre" => $request->nombre, 
            "apellido_paterno" => $request->apellido_paterno,
            "apellido_materno" => $request->apellido_materno,
            "sexo" => $request->sexo,
            "edad" => $request->edad,]);
    }

    // Fin de funcion INFO

    // Function Datos

        public function datos(request $request){
            $request->validate([
                "nombre" => "required|string",
                "apellido_paterno" => "required|string",
                "apellido_materno" => "required|string",
                "sexo" => "required|string",
                "edad" => "required|numeric"
            ]);
            
                $persona1 = new Persona();
                return $persona1->insertar($request);
        
        
        }

    // FIN DE Datos()

      // Function Datos Api

      public function datosApi(request $request){

         $validator = validator::make($request->all(),[
             "nombre" => "required|string",
             "apellido_paterno" => "required|string",
             "apellido_materno" => "required|string",
             "sexo" => "required|string",
             "edad" => "required|numeric"
         ]);

          if ($validator->fails()) {
              return response()->json($validator->errors(),422);
          }

          return response()->json($request->all(),200);

       

        $persona1 = new Persona();
        return $persona1->insertar($request);
          
      
    }

    // FIN DE Datos()

    public function formulario(){

        $datos = array(
            ["nombre" => "Luis" , "apellido_paterno" => "Mendez" , "apellido_materno" => "Ramos" , "sexo" =>"Masculino" , "edad"=>18],
            ["nombre" => "Carla" , "apellido_paterno" => "Duran" , "apellido_materno" => "Gonzalez" , "sexo" =>"Femenino" , "edad"=>16],
            ["nombre" => "Enrique" , "apellido_paterno" => "Perez" , "apellido_materno" => "Fernandez" , "sexo" =>"Masculino" , "edad"=>20],
            ["nombre" => "Luisa" , "apellido_paterno" => "Rodriguez" , "apellido_materno" => "Ramos" , "sexo" =>"Femenino" , "edad"=>17],
            ["nombre" => "Jose" , "apellido_paterno" => "Alvarado" , "apellido_materno" => "Ramos" , "sexo" =>"Masculino" , "edad"=>21],
            ["nombre" => "Juana" , "apellido_paterno" => "Villa" , "apellido_materno" => "Ramos" , "sexo" =>"Femenino" , "edad"=>22],
            ["nombre" => "Andrea" , "apellido_paterno" => "Pabon" , "apellido_materno" => "Mata" , "sexo" =>"Femenino" , "edad"=>24]
        );
       
        return view("formulario",["datos"=>json_encode($datos)]);
    }

    public function formularioDos(){

        // $datos = array(
        //     ["nombre" => "Luis" , "apellido_paterno" => "Mendez" , "apellido_materno" => "Ramos" , "sexo" =>"Masculino" , "edad"=>18],
        //     ["nombre" => "Carla" , "apellido_paterno" => "Duran" , "apellido_materno" => "Gonzalez" , "sexo" =>"Femenino" , "edad"=>16],
        //     ["nombre" => "Enrique" , "apellido_paterno" => "Perez" , "apellido_materno" => "Fernandez" , "sexo" =>"Masculino" , "edad"=>20],
        //     ["nombre" => "Luisa" , "apellido_paterno" => "Rodriguez" , "apellido_materno" => "Ramos" , "sexo" =>"Femenino" , "edad"=>17],
        //     ["nombre" => "Jose" , "apellido_paterno" => "Alvarado" , "apellido_materno" => "Ramos" , "sexo" =>"Masculino" , "edad"=>21],
        //     ["nombre" => "Juana" , "apellido_paterno" => "Villa" , "apellido_materno" => "Ramos" , "sexo" =>"Femenino" , "edad"=>22],
        //     ["nombre" => "Andrea" , "apellido_paterno" => "Pabon" , "apellido_materno" => "Mata" , "sexo" =>"Femenino" , "edad"=>24]
        // );
       
        return view("formularioDos");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
