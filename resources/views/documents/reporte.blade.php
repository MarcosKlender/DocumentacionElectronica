@extends('master')

@section('titulo')
<title>Reporte</title>
@endsection

@section('tabla')

<div class="container text-center my-4">
  <h2>Reporte de Documentos</h2>
</div>

<div class="container text-center my-4">
  <canvas id="BarChart" width="400" height="250"></canvas>
  <script>
  var ctx = document.getElementById("BarChart");
  var BarChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Facturas", "Notas de Débito", "Notas de Crédito", "Retenciones", "Guías de Remisión"],
          datasets: [{
              label: 'Número de descargas',
              data: [256, 69, 51, 173, 22],
              backgroundColor: [
                  'rgba(255,  99, 132, 0.6)',
                  'rgba( 54, 162, 235, 0.6)',
                  'rgba(255, 236,  26, 0.6)',
                  'rgba( 75, 192, 192, 0.6)',
                  'rgba(153, 102, 255, 0.6)'
              ],
              borderColor: [
                  'rgba(255,  99, 132, 1)',
                  'rgba( 54, 162, 235, 1)',
                  'rgba(255, 206,  86, 1)',
                  'rgba( 75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
  </script>

</div>

@endsection