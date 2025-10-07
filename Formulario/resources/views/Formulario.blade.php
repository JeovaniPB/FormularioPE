<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulario Escolar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

<style>
  
  .hero-bg {
    min-height: 100vh;
    display: grid;
    place-items: center;
    background: radial-gradient(1200px 600px at 10% 10%, #eef4ff 0%, #f7f9ff 35%, #f9fbff 60%, #ffffff 100%);
    position: relative;
    overflow: hidden;
  }
  .hero-bg::before, .hero-bg::after {
    content: "";
    position: absolute;
    width: 420px; height: 420px;
    filter: blur(60px);
    opacity: 0.3;
    border-radius: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none;
  }
  .hero-bg::before {
    top: 10%; left: 15%;
    background: linear-gradient(135deg, #7c8cff, #a1c4fd);
  }
  .hero-bg::after {
    bottom: -5%; right: -5%;
    background: linear-gradient(135deg, #ffb6b9, #ffd6a5);
  }

  
  .glass-card {
    backdrop-filter: saturate(1.2) blur(2px);
    border: 1px solid rgba(30, 41, 59, 0.08);
    border-radius: 18px;
    box-shadow:
      0 10px 25px rgba(2, 6, 23, 0.06),
      0 4px 10px rgba(2, 6, 23, 0.04);
  }

  
  .title-wrap .title { letter-spacing: 0.2px; }
  .title-wrap .subtitle { color: #64748b; }

  
  .input, .select select {
    border-radius: 12px;
    border-color: #e6e9f0;
    transition: box-shadow .2s, border-color .2s, transform .05s;
  }
  .input:focus, .select select:focus {
    border-color: #8ba7ff !important;
    box-shadow: 0 0 0 0.2rem rgba(107, 139, 255, 0.15) !important;
  }

  
  input[type="range"] {
    height: 2px;
    border-radius: 999px;
  }

 
  .value-badge {
    display: inline-block;
    padding: 0.35rem 0.6rem;
    border-radius: 999px;
    font-weight: 600;
    font-size: 0.9rem;
    background: #f1f5ff;
    color: #3949ab;
  }
  .value-line { display: flex; justify-content: flex-end; margin-top: .35rem; }

 
  .btn-gradient {
    background-image: linear-gradient(90deg, #5563de, #7b8dff);
    color: #fff !important;
    border: none;
    border-radius: 999px;
    padding: 0.9rem 1.4rem;
    box-shadow: 0 8px 18px rgba(85, 99, 222, 0.25);
    transition: transform .06s ease, box-shadow .2s ease, filter .2s ease;
  }
  .btn-gradient:hover { filter: brightness(1.03); box-shadow: 0 10px 22px rgba(85,99,222,.32); }
  .btn-gradient:active { transform: translateY(1px); }

  
  .soft-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(2,6,23,.07), transparent);
    margin: 1rem 0 1rem;
  }
</style>

<section class="hero-bg">
  <div class="container">

    <div class="columns is-centered">
      <div class="column">
        <div class="title-wrap has-text-centered mb-4">
          <h1 class="title is-3 mb-3">Formulario Escolar</h1>
          <p class="subtitle is-6 mt-3">Completa tus datos. Tardas menos de 2 minutos.</p>

    <!-- Mensaje de éxito -->
    @if(session('success'))
      <div class="notification is-success">
        {{ session('success') }}
      </div>
    @endif

    <form class="box" method="POST" action="{{ route('formulario.store') }}">
      @csrf
          <!-- Correo -->
          <div class="field">
            <label class="label">Correo</label>
            <div class="control has-icons-left">
              <input class="input" name="correo" type="email" placeholder="ejemplo@correo.com" required>
              <span class="icon is-left">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="#94a3b8"><path d="M20 4H4a2 2 0 0 0-2 2v12a2
                 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 18V8.236l7.386
                 5.83a1 1 0 0 0 1.228 0L20 8.236V18H4z"/></svg>
              </span>
            </div>
          </div>

          <!-- Nombre completo -->
          <div class="field">
            <label class="label">Nombre completo</label>
            <div class="control">
              <input class="input" name="nombre" type="text" placeholder="Tu nombre completo" required>
            </div>
          </div>

          <div class="soft-divider"></div>

          <!-- Fila de selects -->
          <div class="columns is-variable is-4 is-align-items-end">
            <div class="column">
              <div class="field">
                <label class="label">Sexo</label>
                <div class="select is-fullwidth">
                  <select name="sexo">
                    <option>Masculino</option>
                    <option>Femenino</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label class="label">¿Tienes alguna discapacidad?</label>
                <div class="select is-fullwidth">
                  <select name="discapacidad">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label class="label">¿Trabajas actualmente?</label>
                <div class="select is-fullwidth">
                  <select name="trabaja">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <!-- Carrera -->
          <div class="field">
            <label class="label">Carrera</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="carrera">
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

          <div class="soft-divider"></div>

          <!-- Sliders 1 -->
          <div class="columns is-variable is-4">
            <div class="column">
              <div class="field">
                <label class="label">Edad</label>
                <input class="input is-fullwidth" name="edad" type="number" min="15" max="60" value="20" id="edad">
                <div class="value-line"><span id="edadValue" class="value-badge">20 años</span></div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Semestre</label>
                <input class="input is-fullwidth" type="number" name="semestre" min="1" max="10" value="1" id="semestre">
                <div class="value-line"><span id="semestreValue" class="value-badge">1° semestre</span></div>
              </div>
            </div>
          </div>

          <!-- Sliders 2 -->
          <div class="columns is-variable is-4">
            <div class="column">
              <div class="field">
                <label class="label">Estatura (cm)</label>
                <input class="input is-fullwidth" type="number" name="estatura" min="120" max="220" value="170" id="estatura">
                <div class="value-line"><span id="estaturaValue" class="value-badge">170 cm</span></div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Peso (kg)</label>
                <input class="input is-fullwidth " type="number" name="peso" min="40" max="200" value="70" id="peso">
                <div class="value-line"><span id="pesoValue" class="value-badge">70 kg</span></div>
              </div>
            </div>
          </div>

          <!-- Sliders 3 -->
          <div class="columns is-variable is-4">
            <div class="column">
              <div class="field">
                <label class="label">Altura (m)</label>
                <input class="input is-fullwidth " type="number" min="1.20" max="2.20" step="0.01" value="1.70" id="altura">
                <div class="value-line"><span id="alturaValue" class="value-badge">1.70 m</span></div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Promedio anterior</label>
                <input class="input is-fullwidth " type="number" name="promedio" min="0" max="10" step="0.1" value="8" id="promedio">
                <div class="value-line"><span id="promedioValue" class="value-badge">8.0</span></div>
              </div>
            </div>
          </div>

          <!-- Sliders 4 -->
          <div class="columns is-variable is-4">
            <div class="column">
              <div class="field">
                <label class="label">Tiempo de traslado (min)</label>
                <input class="input is-fullwidth " type="number" name="traslado" min="0" max="180" step="5" value="30" id="traslado">
                <div class="value-line"><span id="trasladoValue" class="value-badge">30 min</span></div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Gasto mensual para la escuela ($)</label>
                <input class="input is-fullwidth " type="number" name="gasto" min="0" max="10000" step="100" value="2000" id="gasto">
                <div class="value-line"><span id="gastoValue" class="value-badge">$2,000</span></div>
              </div>
            </div>
          </div>

          <!-- Botón -->
          <div class="field is-grouped is-justify-content-center mt-4">
            <div class="control">
              <button type="submit" class="button btn-gradient">Enviar</button>
            </div>
          </div>
          
          <div class="field is-grouped is-justify-content-center">
             <a href="{{ url('/login') }}">Soy Administrador</a>
          </div>
        </form>

        <p class="has-text-centered is-size-7 has-text-grey mt-3">
          Tus datos están protegidos y no se compartirán con terceros.
        </p>
      </div>
    </div>
  </div>
</section>

<script>
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
</script>
</body>
</html>
