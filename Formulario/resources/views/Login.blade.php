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
    <div class="columns is-centered">
      <div class="column is-4-desktop is-6-tablet">
        <div class="box">
          <h1 class="title has-text-centered">Iniciar Sesión</h1>
          
          <form>
            <!-- Usuario -->
            <div class="field">
              <label class="label">Usuario</label>
              <div class="control has-icons-left">
                <input class="input" type="text" placeholder="Ingresa tu usuario" required>
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </div>
            </div>

            <!-- Contraseña -->
            <div class="field">
              <label class="label">Contraseña</label>
              <div class="control has-icons-left">
                <input class="input" type="password" placeholder="Ingresa tu contraseña" required>
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </div>
            </div>

            <!-- Botón -->
            <div class="field">
              <div class="control">
                <button class="button is-link is-fullwidth is-rounded">Entrar</button>
              </div>
            </div>
          </form>

          <!-- Extras -->
          <p class="has-text-centered">
            <a href="#">¿Olvidaste tu contraseña?</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Iconos (FontAwesome) -->
<script src="https://kit.fontawesome.com/a2d9d5a56a.js" crossorigin="anonymous"></script>
</body>
</html>
