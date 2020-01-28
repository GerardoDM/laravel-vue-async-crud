<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <title>Document</title>
</head>
<body>

    {{-- <form action="/info" method="POST">
        @csrf
        <input type="text" name="nombre" id="nombre">
        <input type="text" name="apellido_paterno" id="apellido_paterno">
        <input type="text" name="apellido_materno" id="apellido_materno">
        <input type="submit" value="Enviar">
    </form> --}}

    <main id="app">
        <example-Component  alumnos="{{$datos}}"></example-Component>  
    </main> 

    
</body>
<script src="{{mix ('/js/app.js') }}"></script>
</html>