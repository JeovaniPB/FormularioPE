<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

  <style>
    :root {
      --bg-0:#ffffff; --bg-1:#f7f8fc; --ink:#0f172a; --muted:#64748b;
      --primary:#4f46e5; --primary-2:#7c3aed;
      --ring:rgba(79,70,229,.18); --card-border:rgba(2,6,23,.08);
    }

    body, html {
      height: 100%;
      margin: 0;
      background: radial-gradient(1200px 600px at 10% 10%, var(--bg-1) 0%, var(--bg-0) 60%);
    }

    .hero-bg {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    .hero-bg::before, .hero-bg::after {
      content: "";
      position: absolute;
      width: 420px;
      height: 420px;
      border-radius: 50%;
      filter: blur(70px);
      opacity: .35;
      pointer-events: none;
    }

    .hero-bg::before {
      top: 8%;
      left: 14%;
      background: linear-gradient(135deg, var(--primary), var(--primary-2));

    }

    .hero-bg::after {
      bottom: -6%;
      right: -6%;
      background: linear-gradient(135deg, #06b6d4, #22d3ee);
    }

    #chooserBox {
      background: var(--bg-0);
      border: 1px solid var(--card-border);
      border-radius: 20px;
      padding: 3rem 2rem;
      box-shadow:
        0 14px 28px rgba(15, 23, 42, 0.08),
        0 5px 12px rgba(15, 23, 42, 0.05);
      text-align: center;
      width: 90%;
      max-width: 420px;
      z-index: 2;
    }

    #chooserBox img {
      width: 140px;
      margin-bottom: 1.2rem;
    }

    #chooserBox .title {
      font-weight: 800;
      color: var(--ink);
    }

    #chooserBox .subtitle {
      color: var(--muted);
    }

    .btn-gradient {
      background-image: linear-gradient(90deg, var(--primary), var(--primary-2));
      color: #fff !important;
      border: none;
      border-radius: 999px;
      padding: 0.8rem 1.4rem;
      font-weight: 600;
      transition: all .25s ease;
      width: 200px;
      box-shadow: 0 10px 22px rgba(79, 70, 229, .25);
    }

    .btn-gradient:hover {
      filter: brightness(1.08);
      box-shadow: 0 14px 28px rgba(79, 70, 229, .35);
    }

    .btn-outline {
      border: 2px solid var(--primary);
      color: var(--primary);
      border-radius: 999px;
      font-weight: 600;
      width: 200px;
      padding: 0.8rem 1.4rem;
      transition: all .25s ease;
    }

    .btn-outline:hover {
      background: var(--primary);
      color: #fff !important;
      box-shadow: 0 10px 20px rgba(79, 70, 229, .25);
    }
  </style>
</head>

<body>
  <section class="hero-bg">
    <div id="chooserBox">
      <figure class="image is-inline-block mb-4">
  <img src="{{ asset('images/Logo2.png') }}" alt="Logo" style="width: 300px; height: auto;">
</figure>


      <div class="title-wrap mb-5">
        <h1 class="title is-3 mb-5">Bienvenido</h1>
        <p class="subtitle is-6">Selecciona una opción para continuar</p>
      </div>

      <div class="buttons is-centered mt-5 is-flex is-justify-content-center is-flex-direction-column">
        <a href="{{ url('/Formulario') }}" class="button btn-gradient is-medium mb-3">
          Soy Estudiante
        </a>
        <a href="{{ url('/login') }}" class="button btn-outline is-medium">
          Administrador
        </a>
      </div>
    </div>
  </section>
</body>
</html>
