<?php
  require '../../conf/function.php';

  $data = query("SELECT p.poli,
                    (SELECT COUNT(*) 
                        FROM berobat b
                        WHERE b.poli = p.poli
                        AND CURDATE() = b.tgl_berobat
                        AND tindakan = 'Selesai') 
                        AS 'jumlah'
                FROM poli p
                GROUP BY p.poli
                ORDER BY p.id_poli");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Chartjs, PHP dan MySQL Demo Grafik Batang</title>
  <script src="js/Chart.js"></script>
  <style type="text/   ">
    .container {
                width: 50%;
                margin: auto;
            }
    </style>
</head>

<body>

  <div class="container">
    <canvas id="barchart" width="100" height="20"></canvas>
  </div>

</body>

</html>

<script type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = 
  {
      labels: [
        <?php foreach($data as $row) : ?>
          <?php echo '"' . $row["poli"] . '",'?>
        <?php endforeach; ?>]
    ,

    datasets: [
    {
      label: "Kunjungan",
      data: [
        <?php foreach($data as $row) : ?>
          <?php echo '"' . $row["jumlah"] . '",'?>
        <?php endforeach; ?>],
      backgroundColor: [
        '#29B0D0',
        '#2A516E',
        '#F07124',
        '#CBE0E3',
        '#979193',
        '#d93f34',
        '#18c8db',
        '#5a34d9',
        '#d934aa',
        '#e3e017',
        '#e66e86',
        '#b158cc',
        '#3a3fa1',
        '#51a85e',
        '#995c4b',
        '#b9b7ed'
      ]
    }]
  };

  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      legend: {
        display: false
      },
      barValueSpacing: 20,
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
          }
        }],
        xAxes: [{
          gridLines: {
            color: "rgba(0, 0, 0, 0)",
          }
        }]
      }
    }
  });
</script>