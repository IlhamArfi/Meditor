<?php
require '../conf/function.php';

$data = query("SELECT p.poli,
                    (SELECT COUNT(*) 
                        FROM berobat b
                        WHERE b.poli = p.poli
                        AND CURDATE() = b.tgl_berobat
                        AND tindakan = 'Selesai') 
                        AS 'jumlah', p.img
                FROM poli p
                GROUP BY p.poli
                ORDER BY p.id_poli");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/dashboard_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Meditor</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="../media/img/logo.png" alt="" style="max-width: 177px; margin-left: -11px; margin-top: 10px; margin-bottom: 0">
        </a>
        <ul class="side-menu">
			<li><a href="index.php" ><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li><a href="pendaftaran.php" ><i class='bx bxs-chart icon'></i> Pendaftaran</a></li>
			<li><a href="pelayanan.php" ><i class='bx bxs-notepad icon' ></i> Pelayanan</a></li>
			<li><a href="poli_harian.php" class="active"><i class='bx bx-plus-medical icon' ></i> Daftar Poli</a></li>
			<li><a href="pegawai.php" ><i class='bx bxs-user-badge icon'></i> Pegawai</a></li>
		</ul>
        <div class="logout" style="margin-left: 35px; margin-bottom: 30px; position: absolute; bottom: 0; ">
            <a href="logout.php" style="text-decoration: none; color: inherit;"><i class='fas fa-sign-out-alt' style='font-size:29px'></i></a>
        </div>
    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>

            <!-- <h1 class="title">Daftar Poli</h1> -->
            <h1 class="title">Kunjungan Poli Harian</h1>

            <ul class="breadcrumbs">
                <!-- <li><a href="#">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Daftar Poli</a></li> -->

                <li><a href="poli_harian.php" class="active">Harian</a></li>
                <li class="divider">/</li>
                <li><a href="poli_bulanan.php">Bulanan</a></li>
                <li class="divider">/</li>
                <li><a href="poli_tahunan.php">Tahunan</a></li>
            </ul>

            <?php for ($i = 0; $i < 4; $i++) { ?>
                <?php $stop = 0; ?>
                <div class="info-data">

                    <?php foreach ($data as $row) : ?>
                        <?php $stop++; ?>
                        <?php
                        if ($stop === 5 and $i === 0) {
                            break;
                        } elseif ($i === 1) {
                            if ($stop < 5) {
                                continue;
                            }
                            if ($stop === 9) {
                                break;
                            }
                        } elseif ($i === 2) {
                            if ($stop < 9) {
                                continue;
                            }
                            if ($stop === 13) {
                                break;
                            }
                        } elseif ($i === 3) {
                            if ($stop < 13) {
                                continue;
                            }
                            if ($stop === 17) {
                                break;
                            }
                        }
                        ?>
                        <div class="card">
                            <div class="head">
                                <div>
                                    <h2><?= $row["poli"]; ?> </h2>
                                    <img src="<?= $row["img"]; ?>">
                                </div>
                                <h3><?= $row["jumlah"]; ?></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php } ?>

            <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Data Kunjungan Poli Hari ini</h3>
                    </div>
                    <div class="panel ">

                        <div class="panel-body"><iframe src="../assets/chartjs/barchartsjspoliharian.php" width="100%" height="320"></iframe></div>
                    </div>
                </div>
            </div>

            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- NAVBAR -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../assets/js/dashboard_script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="../assets/js/scripts_donut.js"></script>
</body>

</html>