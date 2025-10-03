<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulario Escolar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body class="has-background-light">

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Formulario Escolar</h1>
    <form class="box">

      <!-- Correo -->
      <div class="field">
        <label class="label">Correo</label>
        <div class="control">
          <input class="input" type="email" placeholder="ejemplo@correo.com" required>
        </div>
      </div>

      <!-- Nombre completo -->
      <div class="field">
        <label class="label">Nombre completo</label>
        <div class="control">
          <input class="input" type="text" placeholder="Tu nombre completo" required>
        </div>
      </div>

      <!-- Sexo -->
      <div class="field">
        <label class="label">Sexo</label>
        <div class="control">
          <div class="select is-fullwidth">
            <select>
              <option>Masculino</option>
              <option>Femenino</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Edad -->
      <div class="field">
        <label class="label">Edad</label>
        <input class="slider is-fullwidth is-info" type="range" min="15" max="60" value="20" id="edad">
        <p id="edadValue" class="has-text-weight-semibold">20 años</p>
      </div>

      <!-- Carrera -->
      <div class="field">
        <label class="label">Carrera</label>
        <div class="control">
          <div class="select is-fullwidth">
            <select>
              <option>Ingeniería en Computación</option>
              <option>Ingeniería Química</option>
              <option>Ingeniería en Diseño</option>
              <option>Ingeniería en Petróleos</option>
              <option>Ingeniería en Energías Renovables</option>
              <option>Ingeniería Industrial</option>
              <option>Licenciatura en Matemáticas Aplicadas</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Semestre -->
      <div class="field">
        <label class="label">Semestre</label>
        <input class="slider is-fullwidth is-link" type="range" min="1" max="10" value="1" id="semestre">
        <p id="semestreValue" class="has-text-weight-semibold">1° semestre</p>
      </div>

      <!-- Estatura -->
      <div class="field">
        <label class="label">Estatura (cm)</label>
        <input class="slider is-fullwidth is-primary" type="range" min="120" max="220" value="170" id="estatura">
        <p id="estaturaValue" class="has-text-weight-semibold">170 cm</p>
      </div>

      <!-- Peso -->
      <div class="field">
        <label class="label">Peso (kg)</label>
        <input class="slider is-fullwidth is-primary" type="range" min="40" max="200" value="70" id="peso">
        <p id="pesoValue" class="has-text-weight-semibold">70 kg</p>
      </div>

      <!-- Promedio anterior -->
      <div class="field">
        <label class="label">Promedio anterior</label>
        <input class="slider is-fullwidth is-success" type="range" min="0" max="10" step="0.1" value="8" id="promedio">
        <p id="promedioValue" class="has-text-weight-semibold">8.0</p>
      </div>

      <!-- Tiempo de traslado -->
      <div class="field">
        <label class="label">Tiempo de traslado (min)</label>
        <input class="slider is-fullwidth is-warning" type="range" min="0" max="180" step="5" value="30" id="traslado">
        <p id="trasladoValue" class="has-text-weight-semibold">30 min</p>
      </div>

      <!-- Gasto mensual -->
      <div class="field">
        <label class="label">Gasto mensual para la escuela ($)</label>
        <input class="slider is-fullwidth is-danger" type="range" min="0" max="10000" step="100" value="2000" id="gasto">
        <p id="gastoValue" class="has-text-weight-semibold">$2000</p>
      </div>

      <!-- Discapacidad -->
      <div class="field">
        <label class="label">¿Tienes alguna discapacidad?</label>
        <div class="select is-fullwidth">
          <select>
            <option>No</option>
            <option>Sí</option>
          </select>
        </div>
      </div>

      <!-- Trabaja -->
      <div class="field">
        <label class="label">¿Trabajas actualmente?</label>
        <div class="select is-fullwidth">
          <select>
            <option>No</option>
            <option>Sí</option>
          </select>
        </div>
      </div>

      <!-- Altura (en metros) -->
      <div class="field">
        <label class="label">Altura (m)</label>
        <input class="slider is-fullwidth is-info" type="range" min="1.20" max="2.20" step="0.01" value="1.70" id="altura">
        <p id="alturaValue" class="has-text-weight-semibold">1.70 m</p>
      </div>

      <!-- Botón -->
      <div class="field is-grouped is-justify-content-center">
        <div class="control">
          <button class="button is-link is-rounded">Enviar</button>
        </div>
      </div>

    </form>
  </div>
</section>

<script>
  // Función helper para actualizar valores
  function updateValue(id, suffix="") {
    const input = document.getElementById(id);
    const output = document.getElementById(id + "Value");
    input.addEventListener("input", () => {
      output.textContent = input.value + suffix;
    });
  }

  updateValue("edad", " años");
  updateValue("semestre", "° semestre");
  updateValue("estatura", " cm");
  updateValue("peso", " kg");
  updateValue("promedio");
  updateValue("traslado", " min");
  updateValue("gasto", " $");
  updateValue("altura", " m");
</script>

</body>
</html>
