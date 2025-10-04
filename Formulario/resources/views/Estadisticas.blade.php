<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estadísticas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body class="has-background-light">

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Estadísticas de Respuestas</h1>

    <div class="table-container">
      <table class="table is-fullwidth is-striped is-hoverable is-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Edad</th>
            <th>Carrera</th>
            <th>Semestre</th>
            <th>Estatura</th>
            <th>Peso</th>
            <th>Promedio</th>
            <th>Traslado (min)</th>
            <th>Trabaja</th>
            <th>Gasto ($)</th>
            <th>Discapacidad</th>
            <th>Altura (m)</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          @foreach($respuestas as $r)
          <tr>
            <td>{{ $r->id }}</td>
            <td>{{ $r->correo }}</td>
            <td>{{ $r->nombre }}</td>
            <td>{{ $r->sexo }}</td>
            <td>{{ $r->edad }}</td>
            <td>{{ $r->carrera }}</td>
            <td>{{ $r->semestre }}</td>
            <td>{{ $r->estatura }}</td>
            <td>{{ $r->peso }}</td>
            <td>{{ $r->promedio }}</td>
            <td>{{ $r->traslado }}</td>
            <td>{{ $r->trabaja ? 'Sí' : 'No' }}</td>
            <td>{{ $r->gasto }}</td>
            <td>{{ $r->discapacidad ? 'Sí' : 'No' }}</td>
            <td>{{ $r->altura }}</td>
            <td>{{ $r->created_at->format('d/m/Y H:i') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</section>

</body>
</html>
