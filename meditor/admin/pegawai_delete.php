<?php

require '../conf/function.php';

    $id = $_GET["id"];
if ( hapus_pegawai($id) > 0 ) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'pegawai.php';
        </script>
        ";
} 
else {
    echo "
    <script>
            alert('data gagal dihapus!');
            document.location.href = 'pegawai.php';
        </script>
        ";
    
}
