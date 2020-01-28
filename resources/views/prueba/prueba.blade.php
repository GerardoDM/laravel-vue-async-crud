<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Prueba</title>
    <style>
      
        .Masculino{
            background-color: blue;
            color: black;
        }

        .Femenino{
            background-color: pink;
            color: black;
        }
    </style>
</head>
<body>


    
   @if ($edad > 18 )
       
<h1 style="color:{{$color}}">{{"Bienvenido ".$nombre}}</h1>
        

  @else
   <h1>No eres bienvenido</h1>
    
    
   @endif    
   
   
<table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido P</th>
        <th>Apellido M</th>
        <th>Sexo</th>
        <th>Edad</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($datos as $dato)
    <tr class=".{{$sexo}}">
        <td>{{$dato['nombre']}}</td>
        <td>{{$dato['ap_paterno']}}</td>
        <td>{{$dato['ap_materno']}}</td>
        <td>{{$dato['sexo']}}</td>
        <td>{{$dato['edad']}}</td>
        </tr>
      @endforeach

    </tbody>
  </table>

 
</body>
</html>
