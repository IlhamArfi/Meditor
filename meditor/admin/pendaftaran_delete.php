<?php

require '../conf/function.php';

    $id = $_GET["id"];
if ( hapus_pasien($id) > 0 ) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'pendaftaran.php';
        </script>
        ";
} 
else {
    echo "
    <script>
            alert('Data gagal dihapus!');
            document.location.href = 'pegawai.php';
        </script>
        ";
    
}