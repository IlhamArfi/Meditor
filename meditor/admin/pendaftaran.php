<?php
session_start();
require '../conf/function.php';
$number = 1;

$data = query("SELECT * FROM pasien 
				ORDER BY nama
");

if (isset($_POST["cek"])) {
	$data = cek($_POST["keyword"]);
}

if (isset($_POST["hapus"])) {

	if (hapus_pasien($id) > 0 and $_POST["hapus"]) {
		$gambar = $data["gambar"];
		if (file_exists("../z_img/$gambar")) {
			unlink("../z_img/$gambar");
		}
		echo "<script>
                    alert('Berhasil menghapus data');
                    document.location.href = 'pendaftaran.php'
               </script>";
	} else {
		echo "<script>
                    alert('Gagal menghapus data');
                    document.location.href = 'pendaftaran.php'
               </script>";
	}
}
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
			<li><a href="index.php" ><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li><a href="pendaftaran.php" class="active"><i class='bx bxs-chart icon'></i> Pendaftaran</a></li>
			<li><a href="pelayanan.php" ><i class='bx bxs-notepad icon' ></i> Pelayanan</a></li>
			<li><a href="poli_harian.php"><i class='bx bx-plus-medical icon' ></i> Daftar Poli</a></li>
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
			<h1 class="title">Pendaftaran</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Pendaftaran</a></li>
			</ul>

			<div class="info-data">
				<div>
					<form method="POST">
						<div class="row mb-3" style="padding: 0;">
							<label for="inputnama" class="col-sm-2 col-form-label">Kata Kunci</label>
							<div class="col" style="padding: 0;">
								<input autocomplete="off" name="keyword" type="text" placeholder="Nama / NIK" class="form-control" id="inputnama">
							</div>
						</div>

						<!-- <div class="row mb-3">
                            <label for="inputnik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputnik">
                            </div>
                        </div> -->

						<div class="row mb-3">
							<button name="cek" type="submit" class="btn btn-primary">Cari Data</button>
						</div>

						<div class="row mb-3">
							<input type="button" class="btn btn-primary" onclick="location.href='pendaftaran_pasienBaru.php';" value="Daftar Pasien Baru" />
						</div>

					</form>

				</div>

			</div>

			<div class="data">
				<div class="content-data">
					<div class="head">
						<h3>Data Pasien</h3>
					</div>

					<div>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">NIK</th>
									<th scope="col">Nama</th>
									<th scope="col">Kelamin</th>
									<th scope="col">Alamat</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $row) : ?>
									<tr>
										<th scope="row"><?= $number;
														$number++; ?></th>
										<td><?= $row["nik"]; ?></td>
										<td><?= $row["nama"]; ?></td>
										<td><?= $row["kelamin"]; ?></td>
										<td>Kec. <?= $row["kecamatan"]; ?>, <?= $row["kabupaten"]; ?></td>
										<td>
											<a class="btn btn-primary" style="margin-left: 100px;" href="pendaftaran_berobat.php?id=<?= $row["nik"]; ?>">
												Daftar Berobat</a>
										</td>

										<td>
											<a class="btn btn-primary" style="padding: 5;" href="pendaftaran_edit.php?id=<?= $row["nik"]; ?>">
												<i class="fa fa-pencil-square" style="font-size:24px; float: right"></i>
											</a>

											<a class="btn btn-danger" style="padding: 5;" href="pendaftaran_delete.php?id=<?= $row["nik"]; ?>" onclick="return confirm('Apakah anda yakin ingin ingin menghapus data pasien ini?')">
												<i class="fa fa-trash" style="font-size:24px; float: right"></i>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

					</div>
				</div>

			</div>



		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../assets/js/dashboard_script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>