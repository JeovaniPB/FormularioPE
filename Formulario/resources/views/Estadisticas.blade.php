<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estadísticas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
  <link rel="stylesheet" href="{{ asset('../css/uncss.css') }}">
  <style>
    

    html, body {
  min-height: 100%;
  background-color: #eaf2ff;   /* elige tu azul (#eaf2ff es suave) */
}



/* Asegura que nada de tus wrappers fuerce un fondo blanco */
.stats-wrapper { background: transparent; }

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

    .stats-wrapper { min-height: 100vh; position: relative; }
      



    .stats-box.box {
      max-width: 1400px;
      margin: 0 auto;
      background: rgba(255,255,255,0.85);
      border: 1px solid rgba(255,255,255,0.5);
      border-radius: 14px;
      box-shadow: 0 15px 35px rgba(0,0,0,.08);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      padding: 1.5rem 1.5rem 2rem;
    }

    .filters-bar{
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 1rem;
      justify-content: center;
      align-items: center;
    }
    
.filters-bar .select,
.filters-bar .select select{
  width: 100%;
  height: 2.6rem;
  border-radius: 12px;
  border-color: #e6e9f0;
 transition: box-shadow .2s, border-color .2s, transform .05s;

}

 .filters-bar .select select:focus {
    border-color: #8ba7ff !important;
    box-shadow: 0 0 0 0.2rem rgba(107, 139, 255, 0.15) !important;
  }
  

    .filters-bar .field { 
      width: 210px;  
      margin-bottom: 0; 
    }
    .filters-bar .label { 
    font-size: 1rem; 
    margin-bottom: .35rem;             
    font-weight: 700;  
    color: #111827;      
    letter-spacing: .2px; 
    }

    .btn-gradient {
    background-image: linear-gradient(90deg, #5563de, #7b8dff);
    color: #fff !important;
    border: none;
    border-radius: 999px;
    padding: 0.9rem 1.4rem;
    box-shadow: 0 8px 18px rgba(85, 99, 222, 0.25);
    transition: transform .06s ease, box-shadow .2s ease, filter .2s ease;
    margin-bottom: 1rem;
  }
  .btn-gradient:hover { filter: brightness(1.03); box-shadow: 0 10px 22px rgba(85,99,222,.32); }
  .btn-gradient:active { transform: translateY(1px); }

  /* --- Tarjeta de la tabla --- */
#tablaContainer.table-container{
  background:#fff;
  border-radius:16px;
  box-shadow:0 12px 28px rgba(2,6,23,.10);
  border:1px solid #eef1f7;
  overflow:hidden; /* respeta el redondeado */
}

/* --- Tabla --- */
#tablaRespuestas{
  border-collapse:separate;
  border-spacing:0;
  background:#fff;
}

/* Sticky header */
#tablaRespuestas thead th{
  position:sticky;
  top:0;
  z-index:2;
  background:#f6f8ff !important;
  color:#111827;
  font-weight:700;
  letter-spacing:.2px;
  border-bottom:1px solid #e6e9f0 !important;
}

/* Filas alternadas + hover suave (complementa Bulma) */
#tablaRespuestas tbody tr:nth-child(even){ background:#fbfcff; }
#tablaRespuestas tbody tr:hover{ background:#eef4ff; }

/* Padding consistente */
#tablaRespuestas th,
#tablaRespuestas td{
  padding:14px 16px !important;
  vertical-align:middle;
  border-bottom:1px solid #eef1f7;
}

/* Alinear números a la derecha con números tabulares */



/* Chips Sí/No para columnas 10 (Trabaja) y 12 (Discapacidad) sin tocar Blade */
#tablaRespuestas tbody td:nth-child(10),
#tablaRespuestas tbody td:nth-child(12){
  position:relative;
  color:transparent;               /* oculto el texto original */
}
#tablaRespuestas tbody tr[data-trabaja="Sí"] td:nth-child(10)::after,
#tablaRespuestas tbody tr[data-discapacidad="Sí"] td:nth-child(12)::after{
  content:"Sí";
  background:#ecfdf5; color:#047857;
}
#tablaRespuestas tbody tr[data-trabaja="No"] td:nth-child(10)::after,
#tablaRespuestas tbody tr[data-discapacidad="No"] td:nth-child(12)::after{
  content:"No";
  background:#fef2f2; color:#b91c1c;
}
#tablaRespuestas tbody td:nth-child(10)::after,
#tablaRespuestas tbody td:nth-child(12)::after{
  position:absolute; inset:0;
  margin:auto; width:max-content; height:fit-content;
  padding:.28rem .6rem; border-radius:999px;
  font-weight:700; font-size:.85rem; line-height:1;
}

/* Indicadores de orden para th.sortable */
#tablaRespuestas th.sortable{ cursor:pointer; }
#tablaRespuestas th.sortable::after{
  content:" ↕"; color:#94a3b8; font-size:.85em;
}
#tablaRespuestas th.sortable.is-asc::after { content:" ↑"; color:#5563de; }
#tablaRespuestas th.sortable.is-desc::after{ content:" ↓"; color:#5563de; }




</style>
</head>
<body>
 
<section class="section stats-wrapper is-flex is-justify-content-center is-align-items-start">
  <div class="stats-box box">
    <h1 class="title has-text-centered has-text-weight-bold">Estadísticas de Respuestas</h1>

 <div class="filters-bar">
   {{-- Selector de carrera --}}
   <div class="field">
     <label class="label">Filtrar por carrera:</label>
     <div class="control">
       <!--div class="select is-fullwidth"-->
       <div class="select">
         <select id="selectCarrera" onchange="filtrar()">
           <option value="todas">Todas las carreras</option>
           @foreach($respuestas->pluck('carrera')->unique() as $carrera)
             <option value="{{ $carrera }}">{{ $carrera }}</option>
           @endforeach
         </select>
       </div>
       <!--/div-->
     </div>
   </div>

   {{-- Selector de semestre --}}
   <div class="field">
     <label class="label">Filtrar por Semestre:</label>
     <div class="control">
       <div class="select">
         <select id="selectSemestre" onchange="filtrar()">
           <option value="todos">Todos los semestres</option>
           @foreach($respuestas->pluck('semestre')->unique()->sort() as $semestre)
             <option value="{{ $semestre }}">{{ $semestre }}</option>
           @endforeach
         </select>
       </div>
     </div>
   </div>

   {{-- Selector de Sexo --}}
  <div class="field">
     <label class="label">Filtrar por Sexo:</label>
     <div class="control">
      <div class="select">
        <select id="selectSexo" onchange="filtrar()">
       <option value="ambos">Todos</option>
       @foreach($respuestas->pluck('sexo')->unique() as $sexo)
         <option value="{{ $sexo }}">{{ $sexo }}</option>
       @endforeach
     </select>
      </div>
     </div>
   </div>


  {{-- Selector trabaja--}}
  <div class="field">
     <label class="label">Filtrar por Trabajo:</label>
     <div class="control">
     <div class="select">
       <select id="selectTrabaja" onchange="filtrar()">
             <option value="ambosT">Si/No</option>
        @foreach($respuestas->pluck('trabaja')->unique() as $t)
          @php $texto = $t ? 'Sí' : 'No'; @endphp
          <option value="{{ $texto }}">{{ $texto }}</option>
        @endforeach
           </select>
     </div> 
     </div> 
    </div>



   {{-- Selector de discapacidad --}}
  <div class="field">
     <label class="label">Filtrar por Discapacidad:</label>
     <div class="control">
     <div class="select">
       <select id="selectDiscapacidad" onchange="filtrar()">
             <option value="ambas">Si/No</option>
        @foreach($respuestas->pluck('discapacidad')->unique() as $d)
          @php $texto = $d ? 'Sí' : 'No'; @endphp
          <option value="{{ $texto }}">{{ $texto }}</option>
        @endforeach
           </select>
     </div> 
      </div>
   </div>

   <!-- Acciones -->
    
     <div class="filters-actions">
       <button class="button btn-gradient" onclick="toggleVista()">Cambiar vista</button>
     </div>


 </div>  


    
    <div id="tablaContainer" class="table-container">
      <table class="table is-fullwidth is-striped is-hoverable is-bordered" id="tablaRespuestas">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Sexo</th>
            <th class="sortable">Edad</th>
            <th>Carrera</th>
            <th class="sortable">Semestre</th>
            <th class="sortable">Estatura</th>
            <th class="sortable">Peso</th>
            <th class="sortable">Promedio</th>
            <th class="sortable">Traslado (min)</th>
            <th>Trabaja</th>
            <th class="sortable">Gasto ($)</th>
            <th>Discapacidad</th>
          </tr>
        </thead>
        <tbody>
          @foreach($respuestas as $r)
          <tr data-carrera="{{ $r->carrera }}"
              data-semestre="{{ $r->semestre }}"
              data-sexo="{{ $r->sexo }}"
              data-trabaja="{{ $r->trabaja ? 'Sí' : 'No' }}"
              data-discapacidad="{{ $r->discapacidad ? 'Sí' : 'No' }}"
              >
            
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
      <div class="columns is-multiline" id="graficasWrapper">
        <!-- Aquí se insertan dinámicamente las gráficas -->
      </div>
    </div>


  </div>
</section>

<script>
  const baseColors = ['#36A2EB','#FF6384','#FFCE56','#4BC0C0','#9966FF'];
  const charts = {};
  const camposGraficables = [
    { campo: "sexo", label: "Sexo" },
    { campo: "edad", label: "Edad" },
    { campo: "carrera", label: "Carrera" },
    { campo: "semestre", label: "Semestre" },
    { campo: "estatura", label: "Estatura" },
    { campo: "peso", label: "Peso" },
    { campo: "promedio", label: "Promedio" },
    { campo: "traslado", label: "Traslado (min)" },
    { campo: "trabaja", label: "Trabaja" },
    { campo: "gasto", label: "Gasto ($)" },
    { campo: "discapacidad", label: "Discapacidad" }
  ];

  // Datos completos 
  const respuestas = {!! json_encode($respuestas) !!};

    function inicializarGraficasHTML() {
      const wrapper = document.getElementById("graficasWrapper");
      wrapper.innerHTML = ""; // limpiar

      camposGraficables.forEach(({ campo, label }) => {
        const div = document.createElement("div");
        div.className = "column is-4 chart-card";
        div.innerHTML = `
          <button class="switch-btn" onclick="toggleChartType('${campo}Chart')">↻</button>
          <canvas id="${campo}Chart"></canvas>
        `;
        wrapper.appendChild(div);
      });
    }


  // Normaliza valores de celdas (mapa de sí/no y sin dato)
  function normalizarValor(raw) {
    if (raw === undefined || raw === null) return 'Sin dato';
    const s = String(raw).trim();
    if (s === '') return 'Sin dato';
    const low = s.toLowerCase();
    if (['sí','si','s','sí','true','1'].includes(low)) return 'Sí';
    if (['no','n','false','0'].includes(low)) return 'No';
    return s; // valor libre (ej. "Masculino", "Femenino", "18 años")
  }

  // Calcula estadísticas leyendo las filas VISIBLES de la tabla (respeta filtros)
  function calcularStatsDesdeTabla(campo) {
    // Mapa de columnas según tu tabla (0-based)
    const col = {
      nombre: 0,
      sexo: 1,
      edad: 2,
      carrera: 3,
      semestre: 4,
      estatura: 5,
      peso: 6,
      promedio: 7,
      traslado: 8,
      trabaja: 9,
      gasto: 10,
      discapacidad: 11
    }[campo];

    const conteo = {};
    const rows = document.querySelectorAll('#tablaRespuestas tbody tr');
    rows.forEach(row => {
      if (row.style.display === 'none') return; // ignorar filas ocultas por filtros
      let raw = '';
      if (typeof col !== 'undefined') {
        raw = (row.children[col] && row.children[col].innerText) ? row.children[col].innerText.trim() : '';
      } else {
        // fallback: intentar dataset
        raw = row.dataset[campo] ?? '';
      }

      const valor = normalizarValor(raw);
      conteo[valor] = (conteo[valor] || 0) + 1;
    });

    // Si no hay filas visibles, devolver al menos un "Sin dato" con 0 (evita charts vacíos)
    if (Object.keys(conteo).length === 0) {
      conteo['Sin dato'] = 0;
    }
    return conteo;
  }

  inicializarGraficasHTML();
  actualizarGraficas();


  // Actualizar gráficas leyendo filas visibles (ya no depende sólo de selectCarrera)
  function actualizarGraficas() {
    camposGraficables.forEach(({ campo, label }) => {
      const data = calcularStatsDesdeTabla(campo);
      crearChart(campo + "Chart", label, data);
    });
  }


  // Filtrar (oculta filas) y ACTUALIZAR gráficas
  function filtrar() {
    const { carrera, semestre, sexo } = getFiltros();
    const filas = document.querySelectorAll('#tablaRespuestas tbody tr');

    filas.forEach(tr => {
      const okCarrera  = coincide(tr.dataset.carrera,  carrera,  'todas');
      const okSemestre = coincide(tr.dataset.semestre, semestre, 'todos');
      const okSexo     = coincide(tr.dataset.sexo,     sexo,     'ambos');

      tr.style.display = (okCarrera && okSemestre && okSexo) ? '' : 'none';
    });

    // <-- AQUI está la clave: volver a calcular las gráficas con las filas visibles
    actualizarGraficas();
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


  // Filtra tabla y actualiza gráficas

  function getFiltros() {
    return {
      carrera: document.getElementById('selectCarrera').value,
      semestre: document.getElementById('selectSemestre').value,
      sexo: document.getElementById('selectSexo').value,
      discapacidad: document.getElementById('selectDiscapacidad').value,
      trabaja: document.getElementById('selectTrabaja').value
    };
  }

  // Compara con comodín
  function coincide(valorFila, valorFiltro, comodin) {
    return valorFiltro === comodin || String(valorFila) === String(valorFiltro);
  }

 // Aplica los 3 filtros juntos
  function filtrar() {
    const { carrera, semestre, sexo, discapacidad, trabaja } = getFiltros();
    const filas = document.querySelectorAll('#tablaRespuestas tbody tr');

    filas.forEach(tr => {
      const okCarrera  = coincide(tr.dataset.carrera,  carrera,  'todas');
      const okSemestre = coincide(tr.dataset.semestre, semestre, 'todos');
      const okSexo     = coincide(tr.dataset.sexo,     sexo,     'ambos');
      const okDiscapacidad = coincide(tr.dataset.discapacidad, discapacidad, 'ambas');
      const okTrabaja = coincide(tr.dataset.trabaja, trabaja, 'ambosT');

      tr.style.display = (okCarrera && okSemestre && okSexo && okDiscapacidad && okTrabaja) ? '' : 'none';
    });
  }

  // Alternar vista tabla / gráficas
  function toggleVista() {
    const tabla = document.getElementById('tablaContainer');
    const graficas = document.getElementById('graficasContainer');

    tabla.classList.toggle('is-hidden');
    graficas.classList.toggle('is-hidden');

    if (!graficas.classList.contains('is-hidden')) {
      // Espera un poco para que el contenedor se renderice y se mida bien
      setTimeout(() => {
        actualizarGraficas(); 
      }, 100);
    }
  }


  // Cambiar tipo de gráfica
  function toggleChartType(chartId) {
    const chart = charts[chartId];
    if (!chart) return;

    if (chart.config.type === 'bar') {
      chart.config.type = 'pie';
      chart.options.scales = {}; // limpiar ejes de barras
    } else {
      chart.config.type = 'bar';
      chart.options.scales = {
        x: { beginAtZero: true },
        y: { beginAtZero: true }
      };
    }
    chart.update();
  }



// === ORDENAMIENTO DE TABLA (corregido) ===
document.querySelectorAll("#tablaRespuestas th.sortable").forEach((th) => {
  th.style.cursor = "pointer";
  let asc = true; // estado de orden por cada columna

  th.addEventListener("click", () => {
    const table = th.closest("table");
    const tbody = table.querySelector("tbody");
    const allRows = Array.from(tbody.querySelectorAll("tr"));

    // Obtener índice real de la columna (entre todos los th de la fila de encabezado)
    const headerRow = th.closest('thead').querySelector('tr');
    const ths = Array.from(headerRow.children);
    const colIndex = ths.indexOf(th);
    if (colIndex === -1) return; // seguridad

    // Solo ordenar las filas visibles (las ocultas por el filtro se quedan en su lugar)
    const visibleRows = allRows.filter(row => row.style.display !== 'none');

    // Función para extraer valor numérico o texto limpio de una celda
    const parseCell = (text) => {
      const raw = (text ?? '').toString().trim();
      if (raw === '' || /^(sin dato|n\/a|\-)$/i.test(raw)) return { isEmpty: true, isNumber: false, num: NaN, str: '' };

      // Buscar la primera secuencia numérica (soporta miles y decimales con coma/punto)
      const numMatch = raw.match(/-?\d+[0-9.,]*/);
      if (numMatch) {
        // Normalizar: quitar separadores de miles y usar punto decimal
        let cleaned = numMatch[0].replace(/\.(?=\d{3}(\D|$))/g, ''); // elimina puntos como separador de miles si existen
        cleaned = cleaned.replace(/,/g, '.'); // comas -> punto decimal
        cleaned = cleaned.replace(/[^\d.-]/g, ''); // dejar solo dígitos, punto y guión
        const n = parseFloat(cleaned);
        if (!isNaN(n)) return { isEmpty: false, isNumber: true, num: n, str: raw.toLowerCase() };
      }

      // Si no es numérico, usar comparación de texto (minúsculas para consistencia)
      return { isEmpty: false, isNumber: false, num: NaN, str: raw.toLowerCase() };
    };

    // Ordenar visibleRows
    visibleRows.sort((rowA, rowB) => {
      const aText = rowA.children[colIndex]?.innerText ?? '';
      const bText = rowB.children[colIndex]?.innerText ?? '';
      const A = parseCell(aText);
      const B = parseCell(bText);

      // Ambos numéricos -> comparación numérica
      if (A.isNumber && B.isNumber) {
        return asc ? (A.num - B.num) : (B.num - A.num);
      }
      // Uno numérico y otro no -> poner número primero (ajusta si quieres lo contrario)
      if (A.isNumber && !B.isNumber) return asc ? -1 : 1;
      if (!A.isNumber && B.isNumber) return asc ? 1 : -1;

      // Ambos no numéricos -> comparación de strings
      if (A.str < B.str) return asc ? -1 : 1;
      if (A.str > B.str) return asc ? 1 : -1;
      return 0;
    });

    // Reconstruir el tbody manteniendo las filas ocultas en sus posiciones originales:
    const sortedQueue = visibleRows.slice();
    const finalRows = [];
    allRows.forEach(row => {
      if (row.style.display === 'none') {
        finalRows.push(row);
      } else {
        finalRows.push(sortedQueue.shift());
      }
    });

    // Reinsertar en el DOM
    finalRows.forEach(r => tbody.appendChild(r));

    // Alternar sentido de orden para el próximo clic
    asc = !asc;
  });
});


  inicializarGraficasHTML();
  actualizarGraficas();

</script>
</body>
</html>
