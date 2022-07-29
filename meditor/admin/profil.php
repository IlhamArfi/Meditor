<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/dashboard_style.css">
    <link rel="stylesheet" href="../assets/css/profile.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Meditor</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand"> Meditor</a>
        <ul class="side-menu">
            <li><a href="index.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>


            <li class="divider" data-text="main">Main</li>
            <li><a href="pendaftaran.php"><i class='bx bxs-chart icon'></i> Pendaftaran</a></li>
            <li><a href="pelayanan.php"><i class='bx bxs-widget icon'></i> Pelayanan</a></li>
        </ul>

    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>


        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <h1 class="title">Profile Rumah Sakit</h1>

            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            <span class="font-weight-bold">Rumah Sakit Bejo Diningrat</span>
                            <span class="text-black-50">bejo@gmail.com</span>
                            <!-- <span> </span> -->
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- <h4 class="text-right">Profil</h4> -->
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <h2>Rumah Sakit Bejo </h2>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h2>JL. Kaliurang no 77
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h2>081234567
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h2>www.rsbejo.com
                                </div>
                            </div>

                            <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Simpan</button></div> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="col-md-12">
                                <h2>Nama Toko</h2>
                            </div> <br>
                            <div class="col-md-12">
                                <h2>Alamat Toko</h2>
                            </div>
                        </div>
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