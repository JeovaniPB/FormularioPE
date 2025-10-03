<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body class="has-background-light">

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Iniciar Sesión</h1>

    <div class="columns is-centered">
      <div class="column is-4">
        <form class="box" method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email -->
          <div class="field">
            <label class="label">Correo</label>
            <div class="control">
              <input class="input" type="email" name="email" placeholder="correo@ejemplo.com" required>
            </div>
          </div>

          <!-- Password -->
          <div class="field">
            <label class="label">Contraseña</label>
            <div class="control">
              <input class="input" type="password" name="password" placeholder="********" required>
            </div>
          </div>

          <!-- Errores -->
          @if($errors->any())
            <div class="notification is-danger">
              {{ $errors->first() }}
            </div>
          @endif

          <!-- Botón -->
          <div class="field">
            <div class="control">
              <button class="button is-link is-fullwidth">Iniciar Sesión</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</body>
</html>
