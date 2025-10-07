<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulario Escolar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root{
      --bg-0:#ffffff; --bg-1:#f7f8fc; --ink:#0f172a; --muted:#64748b;
      --primary:#4f46e5; --primary-2:#7c3aed; --ring: rgba(79,70,229,.18);
      --card-border: rgba(2,6,23,.08); --badge-bg:#eef2ff; --badge-ink:#4338ca;
    }
    @media (prefers-color-scheme: dark){
      :root{
        --bg-0:#0b1220; --bg-1:#0f172a; --ink:#e5e7eb; --muted:#94a3b8;
        --primary:#8b5cf6; --primary-2:#22d3ee; --ring: rgba(139,92,246,.25);
        --card-border: rgba(148,163,184,.18); --badge-bg:#1e293b; --badge-ink:#c7d2fe;
      }
    }
    .hero-bg{
      min-height:100vh; display:grid; place-items:center;
      background: radial-gradient(1200px 600px at 10% 10%, var(--bg-1) 0%, var(--bg-0) 60%);
      position:relative; overflow:hidden; z-index:0;
    }
    .hero-bg::before,.hero-bg::after{
      content:""; position:absolute; width:420px; height:420px; filter:blur(70px); opacity:.35; border-radius:50%; pointer-events:none;
    }
    .hero-bg::before{ top:8%; left:14%; background:linear-gradient(135deg, var(--primary), var(--primary-2)); }
    .hero-bg::after{ bottom:-6%; right:-6%; background:linear-gradient(135deg, #06b6d4, #22d3ee); z-index:-1; }

    .box,.glass-card{
      background:var(--bg-0); backdrop-filter:saturate(1.05) blur(2px);
      border:1px solid var(--card-border); border-radius:16px;
      box-shadow:0 10px 24px rgba(2,6,23,.06), 0 4px 10px rgba(2,6,23,.04);
      z-index:2;
      
    }
    .title-wrap .title{ letter-spacing:.2px; color:var(--ink); }
    .title-wrap .subtitle{ color:var(--muted); }

    .input,.select select{
      background:#fff; color:var(--ink); border-radius:12px; border:1px solid #e6e9f0;
      transition: box-shadow .2s, border-color .2s, transform .05s;
    }
    .input:focus,.select select:focus{ border-color:var(--primary)!important; box-shadow:0 0 0 .22rem var(--ring)!important; }
    .input::placeholder{ color:#94a3b8; opacity:1; }
    .has-icons-left .icon{ color:#94a3b8; }

    .value-badge{ display:inline-block; padding:.35rem .6rem; border-radius:999px; font-weight:600; font-size:.9rem; background:var(--badge-bg); color:var(--badge-ink); }
    .value-line{ display:flex; justify-content:flex-end; margin-top:.35rem; }

    .btn-gradient{
      background-image:linear-gradient(90deg, var(--primary), var(--primary-2));
      color:#fff; border:none; border-radius:999px; padding:.9rem 1.4rem;
      box-shadow:0 10px 22px rgba(79,70,229,.28); transition: transform .06s ease, box-shadow .2s ease, filter .2s ease;
    }
    .btn-gradient:hover{ filter:brightness(1.04); box-shadow:0 12px 26px rgba(79,70,229,.34); }
    .btn-gradient:active{ transform:translateY(1px); }

    .soft-divider{ height:1px; background:linear-gradient(90deg,transparent,rgba(2,6,23,.08),transparent); margin:1rem 0; }
    a{ color:var(--primary); } a:hover{ color:var(--primary-2); }

    @media (prefers-color-scheme: dark){
      .input,.select select{ background:#0f172a; border-color:rgba(148,163,184,.25); }
      .input::placeholder{ color:white; }
      .label{ color:var(--ink); }
    }


  
  #chooserBox {
   
    margin: 0 auto;
    border-radius: 20px;
    background: var(--bg-0);
    border: 1px solid var(--card-border);
    box-shadow:
      0 14px 28px rgba(15, 23, 42, 0.08),
      0 5px 12px rgba(15, 23, 42, 0.05);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }



  
  #chooserBox .title {
    color: var(--ink);
    font-weight: 800;
    letter-spacing: 0.3px;
  }

  #chooserBox .subtitle {
    color: var(--muted);
  }

  
  #chooserBox .button {
    width: 200px;
    font-weight: 600;
    border-radius: 999px;
    transition: all 0.25s ease;
  }

  
  .btn-gradient {
    background-image: linear-gradient(90deg, var(--primary), var(--primary-2));
    color: #fff !important;
    border: none;
    box-shadow: 0 10px 22px rgba(79, 70, 229, 0.25);
  }

  .btn-gradient:hover {
    filter: brightness(1.08);
    box-shadow: 0 14px 28px rgba(79, 70, 229, 0.35);
    background: transparent;
    border: 2px solid var(--primary);
   color: var(--primary-2) !important;
  }

  
  .btn-outline {
    background: transparent;
    border: 2px solid var(--primary);
    color: var(--primary);
  }

  .btn-outline:hover {
    background: var(--primary);
    color: #fff;
    box-shadow: 0 10px 20px rgba(79, 70, 229, 0.25);
  }

 
  @media (prefers-color-scheme: dark) {
    #chooserBox {
      background: #0f172a;
      border: 1px solid rgba(148, 163, 184, 0.18);
      box-shadow: 0 12px 26px rgba(0, 0, 0, 0.25);
    }
    #chooserBox:hover {
      box-shadow: 0 16px 36px rgba(0, 0, 0, 0.35);
    }
    .btn-outline {
      color: var(--primary-2);
      border-color: var(--primary-2);
    }
    .btn-outline:hover {
      background: var(--primary-2);
      color: #fff;
    }
  }
  </style>
</head>
<body>
<section class="hero-bg">

  <div class="container">
    <!-- Pantalla inicial con dos botones -->
   <div id="chooser" class="columns is-centered is-mobile">
  <div class="column is-centered is-11-mobile is-11-desktop">
    <div class="box has-text-centered p-6" id="chooserBox">
      <figure class="image  is-1by1">
      <img src="{{ asset('images/Logo2.png') }}" alt="Logo">
      </figure>
      <div class="title-wrap mb-5">
        <h1 class="title is-2 mb-4">Bienvenido</h1>
        <p class="subtitle is-6">Selecciona una opción para continuar</p>
      </div>

      <div class="buttons is-centered mt-5">
        <button id="btnEstudiante" class="button btn-gradient is-medium">
          Soy Estudiante
        </button>
        <a href="{{ url('/login') }}" class="button btn-outline is-medium">
          Administrador
        </a>
      </div>
    </div>
  </div>
</div>
    <!-- Formulario (oculto al inicio) -->
    <div id="formWrapper" class="columns is-centered is-hidden reveal" aria-hidden="true">
      <div class="column is-12">
        <div class="title-wrap has-text-centered mb-4">
          <h1 class="title is-3 mb-3">Formulario Escolar</h1>
          <p class="subtitle is-6 mt-3">Completa tus datos. <br>Tardas menos de 2 minutos.</p>
        </div>

        @if(session('success'))
          <div class="notification is-success">{{ session('success') }}</div>
        @endif

        <form class="box" method="POST" action="{{ route('formulario.store') }}">
          @csrf
          <!-- Correo -->
          <div class="field">
            <label class="label">Correo</label>
            <div class="control has-icons-left">
              <input class="input" type="email" name="correo" placeholder="ejemplo@correo.com" required>
              <span class="icon is-left">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="#94a3b8" aria-hidden="true"><path d="M20 4H4a2 2 0 0 0-2 2v12a2
                  2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 18V8.236l7.386
                  5.83a1 1 0 0 0 1.228 0L20 8.236V18H4z"/></svg>
              </span>
            </div>
          </div>

          <!-- Nombre completo -->
          <div class="field">
            <label class="label">Nombre completo</label>
            <div class="control">
              <input class="input" type="text" name="nombre" placeholder="Tu nombre completo" required>
            </div>
          </div>

          <div class="soft-divider"></div>

           <!-- Números 1 -->
          <div class="columns is-variable is-4">
            <div class="column">
              <div class="field">
                <label class="label">Edad</label>
                <input class="input is-fullwidth" type="number" min="15" max="60" value="20" id="edad" name="edad" required>
                <div class="value-line"><span id="edadValue" class="value-badge">20 años</span></div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Semestre</label>
                <input class="input is-fullwidth" type="number" min="1" max="10" value="1" id="semestre" name="semestre" required>
                <div class="value-line"><span id="semestreValue" class="value-badge">1° semestre</span></div>
              </div>
            </div>
          </div>

          

          <!-- Carrera -->
          <div class="field">
            <label class="label">Carrera</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="carrera" required>
                  <option value="" disabled selected>Selecciona tu carrera</option>
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

          <!-- Números 2 -->
          <div class="columns is-variable is-4">
            <div class="column">
              <div class="field">
                <label class="label">Estatura (cm)</label>
                <input class="input is-fullwidth" type="number" min="120" max="220" value="170" id="estatura" name="estatura" required>
                <div class="value-line"><span id="estaturaValue" class="value-badge">170 cm</span></div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Peso (kg)</label>
                <input class="input is-fullwidth" type="number" min="40" max="200" value="70" id="peso" name="peso" required>
                <div class="value-line"><span id="pesoValue" class="value-badge">70 kg</span></div>
              </div>
            </div>
          </div>

          <!-- Selects -->
          <div class="columns is-variable is-4 is-align-items-end">
            <div class="column">
              <div class="field">
                <label class="label  has-text-centered is-block  has-text-left-mobile">Sexo</label>
                <div class="select is-fullwidth">
                  <select name="sexo" required>
                    <option value="" disabled selected>Selecciona</option>
                    <option>Masculino</option>
                    <option>Femenino</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label class="label has-text-centered is-block  has-text-left-mobile">¿Tienes alguna discapacidad?</label>
                <div class="select is-fullwidth">
                  <select name="discapacidad" required>
                    <option value="" disabled selected>Selecciona</option>
                    <option>No</option>
                    <option>Sí</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label class="label">¿Trabajas actualmente?</label>
                <div class="select is-fullwidth">
                  <select name="trabaja" required>
                    <option value="" disabled selected>Selecciona</option>
                    <option>No</option>
                    <option>Sí</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <!-- Números 3 -->
          <div class="columns is-variable is-4 is-centered">
            <div class="column is-half is-narrow">
              <div class="field">
                <label class="label">Promedio anterior</label>
                <input class="input" type="number" min="0" max="10" step="0.1" value="8" id="promedio" name="promedio" required>
                <div class="value-line"><span id="promedioValue" class="value-badge">8.0</span></div>
              </div>
            </div>
          </div>

          
          <!-- Números 4 -->
          <div class="columns is-variable is-4">
            <div class="column">
              <div class="field">
                <label class="label">Tiempo de traslado (min)</label>
                <input class="input is-fullwidth" type="number" min="0" max="180" step="5" value="30" id="traslado" name="traslado" required>
                <div class="value-line"><span id="trasladoValue" class="value-badge">30 min</span></div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Gasto mensual para la escuela ($)</label>
                <input class="input is-fullwidth" type="number" min="0" max="10000" step="100" value="2000" id="gasto" name="gasto" required>
                <div class="value-line"><span id="gastoValue" class="value-badge">$2,000</span></div>
              </div>
            </div>
          </div>

          <!-- Botón -->
          <div class="field is-grouped is-justify-content-center  is-justify-content-space-between mt-4">


          <div class="control">
  <a href="{{ url()->previous() }}" class="button btn-outline is-rounded">Atrás</a>
</div>

            <div class="control">
              <button type="submit" class="button btn-gradient">Enviar</button>
            </div>
          </div>

          <p class="has-text-centered is-size-7 has-text-grey mt-3">
            Tus datos están protegidos y no se compartirán con terceros.
          </p>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  // Mostrar formulario y ocultar chooser
  const btnEst = document.getElementById('btnEstudiante');
  const chooser = document.getElementById('chooser');
  const formWrapper = document.getElementById('formWrapper');

  btnEst.addEventListener('click', () => {
    chooser.classList.add('is-hidden');
    formWrapper.classList.remove('is-hidden');
    requestAnimationFrame(() => formWrapper.classList.add('show')); // activa animación
    formWrapper.setAttribute('aria-hidden', 'false');
    formWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });

  // Actualizar badges de valores
  function updateValue(id, suffix="") {
    const input = document.getElementById(id);
    const output = document.getElementById(id + "Value");
    if(!input || !output) return;
    const formatMoney = (n) =>
      n.toLocaleString('es-MX', { maximumFractionDigits: 0 });

    const render = () => {
      let v = input.value;
      if(id === 'gasto') v = `$${formatMoney(Number(v||0))}`;
      output.textContent = v + suffix;
    };
    input.addEventListener("input", render);
    render();
  }

  updateValue("edad", " años");
  updateValue("semestre", "° semestre");
  updateValue("estatura", " cm");
  updateValue("peso", " kg");
  updateValue("promedio");
  updateValue("traslado", " min");
  updateValue("gasto", "");
</script>
</body>
</html>
