<?php 
include "../conf/function.php";

$id = $_POST['id'];
$modul = $_POST['modul'];

if ($modul=='Kabupaten') {
    $sql = mysqli_query($conn,"SELECT * FROM wilayah_kabupaten where id_provinsi = (SELECT id FROM wilayah_provinsi WHERE nama = '$id') order by nama ASC")or die(mysqli_error($con));
    $kabupaten='<option value="" disabled selected>--- PILIH KABUPATEN ---</option>';
    while ($dt = mysqli_fetch_array($sql)) {
        $kabupaten.='<option value="'.$dt['nama'].'">'.$dt['nama'].'</option>';
    }

    echo $kabupaten;
}

elseif($modul=='Kecamatan'){
    $sql = mysqli_query($conn,"SELECT * FROM wilayah_kecamatan where id_kabupaten = (SELECT id FROM wilayah_kabupaten WHERE nama = '$id') ORDER BY nama ASC")or die(mysqli_error($con));
    $kecamatan='<option value="" disabled selected>--- PILIH KECAMATAN ---</option>';
    while ($dt = mysqli_fetch_array($sql)) {
        $kecamatan.='<option value="'.$dt['nama'].'">'.$dt['nama'].'</option>';
    }
    echo $kecamatan;
}

?>