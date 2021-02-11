<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/ajax.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">

<body>
  <h2>Notas</h2>
  <div class="w3-container">
    <form method="get" onsubmit="crear(); return false">
      <label for="title">Título</label>
      <input type="text" id="title" name="title" placeholder="Título">

      <label for="description">Descripción</label>
      <input type="text" id="description" name="description" placeholder="Publica la nota.." style="width: 500px;">
    
      <input type="submit" value="Crear">
    </form>
  </div>
  <br>

  <div>
  <table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>Título</th>
        <th>Descripción</th>
        <th colspan="2">Opciones</th>
      </tr>

      <tbody id="datos">
        
      </tbody>
    </thead>
  </table>
  </div>
  <div class="row">
        <div class="column-1">
            <h3 id="mensaje"></h3>
        </div>
    </div>
</body>
</head>
</html>