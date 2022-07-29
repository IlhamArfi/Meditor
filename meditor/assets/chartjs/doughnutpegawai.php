<?php
  require '../../conf/function.php';
$data = query("SELECT j.jabatan,
(SELECT COUNT(*) 
    FROM pegawai p
    WHERE j.jabatan = p.jabatan
    ) 
    AS 'jumlah'
FROM jabatan j
GROUP BY j.jabatan
ORDER BY j.id_pegawai");
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
            labels: [<?php foreach($data as $row) : ?>
          <?php echo '"' . $row["jabatan"] . '",'?>
        <?php endforeach; ?>],
            datasets: [
            {
              label: "Penjualan Barang",
              data: [
        <?php foreach($data as $row) : ?>
          <?php echo '"' . $row["jumlah"] . '",'?>
        <?php endforeach; ?>],
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