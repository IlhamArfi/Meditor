<?php
  require '../../conf/function.php';

$balita = kategori(0, 4)[0];
$anak = kategori(5, 11)[0];
$remaja = kategori(12, 25)[0];
$dewasa = kategori(26, 45)[0];
$lansia = kategori(46, 100)[0];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran (Doughnut)</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 50%;
                margin:  auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="piechart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: ["Bayi", "Anak-Anak", "Remaja", "Dewasa", "Lansia"],
            datasets: [
            {
              label: "Jumlah",
              data: [ "<?php echo(implode(" ", $balita)); ?>",
                      "<?php echo(implode(" ", $anak)); ?>",
                      "<?php echo(implode(" ", $remaja)); ?>",
                      <?php echo(implode(" ", $dewasa)); ?>,
                      <?php echo(implode(" ", $lansia)); ?>
       ],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'doughnut',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>