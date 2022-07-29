<?php
session_start();
require '../conf/function.php';

$number = 1;
$data = query("SELECT * FROM pegawai
                    ORDER BY jabatan, nama
                ");

$jabatan = query("SELECT j.jabatan,
                        (SELECT COUNT(*) 
                        FROM pegawai p
                        WHERE p.jabatan = j.jabatan
                        ) AS 'jumlah', j.img
                    FROM jabatan j
                    GROUP BY j.jabatan
                    ORDER BY j.id_pegawai
                ");

if (isset($_POST["cari"])) {
    $data = cari_pegawai($_POST["keyword"]);
}
?>

<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../assets/css/dashboard_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
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
			<li><a href="pendaftaran.php"><i class='bx bxs-chart icon'></i> Pendaftaran</a></li>
			<li><a href="pelayanan.php"><i class='bx bxs-notepad icon' ></i> Pelayanan</a></li>
			<li><a href="poli_harian.php"><i class='bx bx-plus-medical icon' ></i> Daftar Poli</a></li>
			<li><a href="pegawai.php" class="active"><i class='bx bxs-user-badge icon'></i> Pegawai</a></li>
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
                <h1 class="title">Pegawai</h1>
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li class="divider">/</li>
                    <li><a href="#" class="active">Pegawai</a></li>
                </ul>

                <?php for ($i = 0; $i < 2; $i++) { ?>
                    <?php $stop = 0; ?>
                    <div class="info-data">

                        <?php foreach ($jabatan as $row) : ?>
                            <?php $stop++; ?>
                            <?php
                            if ($stop === 4 and $i === 0) {
                                break;
                            } elseif ($stop < 4 and $i === 1) {
                                continue;
                            }
                            ?>
                            <div class="card">
                                <div class="head">
                                    <div>
                                        <h2><?= $row["jabatan"]; ?> </h2>
                                        <img src="<?= $row["img"]; ?>">
                                    </div>
                                    <h3><?= $row["jumlah"]; ?></h3>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php } ?>

                <div class="info-data">
                    <div>
                        <form action="" method="POST">
                            <div class="row mb-3">
                                <label for="inputnama" class="col-sm-2 col-form-label">Kata kunci</label>
                                <div class="col-sm-10">
                                    <input name="keyword" autocomplete="off" type="text" class="form-control" id="inputnama" placeholder="Nama Pegawai / NIP">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <button type="submit" name="cari" class="btn btn-primary">
                                    Cari Pegawai
                                </button>
                            </div>
                            <div class="row mb-3">
                                <input type="button" class="btn btn-primary" onclick="location.href='pegawai_tambah.php';" value="Tambah Pegawai Baru" />
                                <!-- <button type="submit" name="cari" class="btn btn-primary">
                                    Tambah Pegawai
                                </button> -->
                            </div>
                        </form>
                    </div>
                </div>

                <div class="data">
                    <div class="content-data">
                        <div class="head">
                            <h3>Data Pegawai</h3>
                        </div>

                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col"></th>
                                        <!-- <th scope="col">Status</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) : ?>
                                        <tr>
                                            <th scope="row"><?= $number;
                                                            $number++; ?></th>
                                            <td><?= $row["nip"]; ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td>
                                                <?php
                                                $original_date = $row["tgl_lahir"];

                                                // Creating timestamp from given date
                                                $timestamp = strtotime($original_date);

                                                // Creating new date format from that timestamp
                                                $new_date = date("d-m-Y", $timestamp);
                                                echo $new_date; // Outputs: 31-03-2019
                                                ?>
                                            </td>
                                            <td><?= $row["jabatan"]; ?></td>
                                            <td>Kec. <?= $row["kecamatan"]; ?>, <?= $row["kabupaten"]; ?>, Prov. <?= $row["provinsi"]; ?></td>
                                            <td><?= $row["kelamin"]; ?></td>
                                            <td>
                                                <a class="btn btn-primary" style="padding: 5;" href="pegawai_edit.php?id=<?= $row["nip"]; ?>">
                                                    <i class="fa fa-pencil-square" style="font-size:34px"></i>
                                                </a>

                                                <a class="btn btn-danger" style="padding: 5;" href="pegawai_delete.php?id=<?= $row["nip"]; ?>" onclick="return confirm('Apakah anda yakin ingin ingin menghapus data pegawai ini?')">
                                                    <i class="fa fa-trash" style="font-size:34px"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </main>
            <!-- MAIN -->
        </section>
        <!-- NAVBAR -->

        <script type="text/javascript">
            $(function() {
                $('#datepicker').datepicker();
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="../assets/js/dashboard_script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp14YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    </body>
</php>