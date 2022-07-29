<?php

require '../conf/function.php';

    $id = $_GET["id"];
if ( hapus_pelayanan($id) > 0 ) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'pelayanan.php';
        </script>
        ";
} 
else {
    echo "
    <script>
            alert('data gagal dihapus!');
            document.location.href = 'pelayanan.php';
        </script>
        ";
    
}