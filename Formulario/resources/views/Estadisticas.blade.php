<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estadísticas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .chart-card { position: relative; }
    .switch-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      border: none;
      background: #3273dc;
      color: white;
      border-radius: 5px;
      padding: 4px 8px;
      cursor: pointer;
      font-size: 0.8em;
    }
  </style>
</head>
<body class="has-background-light">

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Estadísticas de Respuestas</h1>

    {{-- Selector de carrera --}}
    <div class="field">
      <label class="label">Filtrar por carrera:</label>
      <div class="control">
        <div class="select is-fullwidth">
          <select id="selectCarrera" onchange="filtrarCarrera()">
            <option value="todas">Todas las carreras</option>
            @foreach($respuestas->pluck('carrera')->unique() as $carrera)
              <option value="{{ $carrera }}">{{ $carrera }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="has-text-right mb-3">
      <button class="button is-link is-light" onclick="toggleVista()">Cambiar vista</button>
    </div>

    <div id="tablaContainer" class="table-container">
      <table class="table is-fullwidth is-striped is-hoverable is-bordered" id="tablaRespuestas">
        <thead>
          <tr>
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
          </tr>
        </thead>
        <tbody>
          @foreach($respuestas as $r)
          <tr data-carrera="{{ $r->carrera }}">
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- GRAFICAS --}}
    <div id="graficasContainer" class="is-hidden">
      <div class="columns is-multiline">
        {{-- Gráfica de Sexo --}}
        <div class="column is-4 chart-card">
          <button class="switch-btn" onclick="toggleChartType('sexoChart')">↻</button>
          <canvas id="sexoChart"></canvas>
        </div>

        {{-- Gráfica de Trabaja --}}
        <div class="column is-4 chart-card">
          <button class="switch-btn" onclick="toggleChartType('trabajaChart')">↻</button>
          <canvas id="trabajaChart"></canvas>
        </div>

        {{-- Gráfica de Discapacidad --}}
        <div class="column is-4 chart-card">
          <button class="switch-btn" onclick="toggleChartType('discapacidadChart')">↻</button>
          <canvas id="discapacidadChart"></canvas>
        </div>
      </div>
    </div>

  </div>
</section>

<script>
  const baseColors = ['#36A2EB','#FF6384','#FFCE56','#4BC0C0','#9966FF'];
  const charts = {};

  // Datos completos 
  const respuestas = {!! json_encode($respuestas) !!};

  // Función para calcular estadísticas por campo
  function calcularStats(carrera, campo) {
    const datosFiltrados = carrera === 'todas'
      ? respuestas
      : respuestas.filter(r => r.carrera === carrera);

    const conteo = {};
    datosFiltrados.forEach(r => {
      let valor = r[campo];

      //console.log(`Procesando valor para campo ${campo}:`, valor);
      // Mapear 0/1 a "No"/"Sí"
      if (valor === 0 || valor === '0' || valor === false) valor = 'No';
      if (valor === 1 || valor === '1' || valor === true) valor = 'Sí';
      if (!valor) valor = 'Sin dato';

      conteo[valor] = (conteo[valor] || 0) + 1;
    });
    return conteo;
  }

  // Crear/actualizar gráficas
  function crearChart(id, label, data, type='pie') {
    const ctx = document.getElementById(id).getContext('2d');
    if (charts[id]) charts[id].destroy(); 
    const chart = new Chart(ctx, {
      type: type,
      data: {
        labels: Object.keys(data),
        datasets: [{
          label: label,
          data: Object.values(data),
          backgroundColor: baseColors,
        }]
      },
      options: { 
        responsive: true, 
        maintainAspectRatio: false,
        plugins: {
          title: {
            display: true,
            text: label,
            font: { size: 18, weight: 'bold' },
            color: '#363636'
          },
          legend: { position: 'bottom' }
        }
      }
    });
    charts[id] = chart;
  }

  // Inicializar con todas las carreras
  function actualizarGraficas() {
    const seleccion = document.getElementById('selectCarrera').value;
    const sexoData = calcularStats(seleccion, 'sexo');
    const trabajaData = calcularStats(seleccion, 'trabaja');
    const discapacidadData = calcularStats(seleccion, 'discapacidad');

    crearChart('sexoChart', 'Sexo', sexoData);
    crearChart('trabajaChart', 'Trabaja', trabajaData);
    crearChart('discapacidadChart', 'Discapacidad', discapacidadData);
  }

  // Filtra tabla y actualiza gráficas
  function filtrarCarrera() {
    const seleccion = document.getElementById('selectCarrera').value;
    const filas = document.querySelectorAll('#tablaRespuestas tbody tr');
    filas.forEach(fila => {
      const carrera = fila.getAttribute('data-carrera');
      fila.style.display = (seleccion === 'todas' || carrera === seleccion) ? '' : 'none';
    });

    actualizarGraficas();
  }

  // Alternar vista tabla / gráficas
  function toggleVista() {
    const tabla = document.getElementById('tablaContainer');
    const graficas = document.getElementById('graficasContainer');

    tabla.classList.toggle('is-hidden');
    graficas.classList.toggle('is-hidden');

    if (!graficas.classList.contains('is-hidden')) {
      setTimeout(() => {
        Object.values(charts).forEach(c => c.resize());
      }, 100);
    }
  }

  // Cambiar tipo de gráfica
  function toggleChartType(id) {
    const chart = charts[id];
    chart.config.type = chart.config.type === 'pie' ? 'bar' : 'pie';
    chart.update();
  }
  actualizarGraficas();
</script>
</body>
</html>
