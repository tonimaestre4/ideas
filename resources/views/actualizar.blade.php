<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<h2>Actualizar</h2>

<div> 
    <form action="{{url('modificar/'.$notes->id)}}" method="post">
    <!-- Evitar ataques -->
        @csrf
        <!-- {{csrf_field()}} -->
            {{method_field('PUT')}}
            <label>Título</label>
            <!-- {{-- {{<input type="text" name="__token" value=csrf_token()> }} --}} -->
            <input type="text" name="title" value="{{$notes->title}}" required>

            <label>Descripción</label>
            <input type="text" style="width: 500px;" name="description" value="{{$notes->description}}" required>

        <br><br>
        <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary">
    </form>
<div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>