<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfil</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body class="has-background-light">

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Perfil de Usuario</h1>

    <div class="box">
      <h2 class="subtitle">Bienvenido, {{ auth()->user()->name }}</h2>
      <p><strong>Correo:</strong> {{ auth()->user()->email }}</p>
      <hr>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="button is-danger" type="submit">Cerrar sesión</button>
      </form>
    </div>
  </div>
</section>

</body>
</html>

