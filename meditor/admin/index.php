<?php
require '../conf/function.php';

$day = query("SELECT COUNT(tgl_berobat) FROM berobat
					WHERE CURDATE() = tgl_berobat 
					AND tindakan = 'Selesai'")[0];

$month = query("SELECT COUNT(tgl_berobat) FROM berobat
					WHERE MONTH(CURDATE()) = MONTH(tgl_berobat)
					AND  YEAR(CURDATE()) = YEAR(tgl_berobat)
					AND tindakan = 'Selesai'")[0];

$year = query("SELECT COUNT(tgl_berobat) FROM berobat
					WHERE YEAR(CURDATE()) = YEAR(tgl_berobat)
					AND tindakan = 'Selesai'")[0];

$totalpasien = query("SELECT COUNT(nik) FROM pasien")[0];

$jumlahpoli = query("SELECT COUNT(id_poli) FROM poli")[0];

$jumlahpegawai = query("SELECT COUNT(nip) FROM pegawai")[0];
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../assets/css/dashboard_style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li><a href="pendaftaran.php"><i class='bx bxs-chart icon'></i> Pendaftaran</a></li>
			<li><a href="pelayanan.php"><i class='bx bxs-notepad icon' ></i> Pelayanan</a></li>
			<li><a href="poli_harian.php"><i class='bx bx-plus-medical icon' ></i> Daftar poli</a></li>
			<li><a href="pegawai.php"><i class='bx bxs-user-badge icon'></i> Pegawai</a></li>
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
			<!-- <form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon'></i>
				</div>
			</form> -->
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>

			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
				<a href="poli_harian.php" style="text-decoration: none ; color: inherit" ;>
					<div class="card">
						<div class="head">
							<div>
								<h3>Kunjungan Hari Ini</h3>
								<img src="../media/img/kalenderhari.png" alt="" style="max-width: 48px;">
							</div>
							<h2><?= implode(" ", $day); ?></h2>
						</div>
					</div>
				</a>

				<a href="poli_bulanan.php" style="text-decoration: none ; color: inherit" ;>
					<div class="card">
						<div class="head">
							<div>
								<h3>Bulan Ini</h3>
								<img src="../media/img/kalenderbulan.png" alt="" style="max-width: 48px;">
							</div>
							<h2><?= implode(" ", $month); ?></h2>
						</div>
					</div>
				</a>

				<a href="poli_tahunan.php" style="text-decoration: none ; color: inherit" ;>
					<div class="card">
						<div class="head">
							<div>
								<h3>Tahun Ini</h3>
								<img src="../media/img/kalendertahun.png" alt="" style="max-width: 48px;">
							</div>
							<h2><?= implode(" ", $year); ?></h2>
						</div>
					</div>
				</a>

			</div>

			<div class="info-data">
				<a href="pendaftaran.php" style="text-decoration: none ; color: inherit" ;>
					<div class="card">
						<div class="head">
							<div>
								<h3>Pasien Terdaftar</h3>
								<img src="../media/img/anak.png" alt="" style="max-width: 48px;">
							</div>
							<h2><?= implode(" ", $totalpasien); ?></h2>
						</div>
					</div>
				</a>

				<a href="poli_harian.php" style="text-decoration: none ; color: inherit" ;>
					<div class="card">
						<div class="head">
							<div>
								<h3>Jumlah Poli</h3>
								<img src="../media/img/poli.png" alt="" style="max-width: 48px;">
							</div>
							<h2><?= implode(" ", $jumlahpoli); ?></h2>
						</div>
					</div>
				</a>
			
				<a href="pegawai.php" style="text-decoration: none; color: inherit; ">
					<div class="card">
						<div class="head">
							<div>
								<h3>Jumlah Pegawai</h3>
								<img src="../media/img/administrasi.png" alt="" style="max-width: 48px;">
							</div>
							<h2><?= implode(" ", $jumlahpegawai); ?></h2>
						</div>
					</div>
				</a>
			</div>

			<div class="barchart">
				<div class="data">
					<div class="content-data">
						<div class="head">
							<h3>Data Kunjungan Poli</h3>
						</div>
						<div class="panel ">

							<div class="panel-body"><iframe src="../assets/chartjs/barchartsjspoli.php" width="100%" height="320"></iframe></div>
						</div>
					</div>
				</div>
			</div>
			<!-- data Kunjungan poli -->

			<div class="data">

				<!-- data pegawai -->
				<div class="content-data">
					<div class="head">
						<h3>Data Pegawai</h3>
					</div>
					<div class="box">
						<div class="panel-body"><iframe src="../assets/chartjs/doughnutpegawai.php" width="100%" height="400"></iframe></div>
					</div>
				</div>
				<!-- data pegawai -->

				<!-- data baru -->
				<div class="content-data">
					<div class="head">
						<h3>Data Kategori Pasien</h3>
					</div>
					<div class="box">
						<div class="panel-body"><iframe src="../assets/chartjs/doughnutumur.php" width="100%" height="400"></iframe></div>
					</div>
				</div>
				<!-- data baru -->

			</div>
			<!-- chart -->
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../assets/js/dashboard_script.js"></script>
	<script src="../assets/chartjs/js/Chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="../assets/js/scripts_donut.js"></script>
</body>

</html>