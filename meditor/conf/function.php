<?php 
    $conn = mysqli_connect("localhost", "root", "", "db_meditor");

    //fungsi ambil data dari tabel apa => Ambil pakai assoc atau array(?)

    // **************************************************************
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

 
    function kategori($x, $y){
        $data = query("SELECT COUNT(FLOOR(DATEDIFF(CURDATE(), tgl_lahir) / 365)) 
              AS 'Balita'
              FROM pasien
              WHERE FLOOR(DATEDIFF(CURDATE(), tgl_lahir) / 365) 
              BETWEEN $x AND $y
              ");
        return $data;
    }


    // ************************************************************* //


    // ========== 1. CREATE (CRUD) ========== //
    
    // Daftar Pasien
    function registrasi($data){
        global $conn;

        $nik = htmlspecialchars(strtolower($data["nik"]));
        $nama = htmlspecialchars(stripslashes(ucwords($data["nama"])));
        $kelamin = htmlspecialchars(stripslashes(ucwords($data["kelamin"])));
        $kabupaten = htmlspecialchars(stripslashes(ucwords($data["kabupaten"])));      
        $kecamatan = htmlspecialchars(stripslashes(ucwords($data["kecamatan"]))); 
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);

        $poli = htmlspecialchars($data["poli"]);      
        $tgl_berobat = htmlspecialchars($data["tgl_berobat"]);

        $query = "INSERT INTO berobat
                    VALUES ('', '$nik', '$poli', '$tgl_berobat', 'Menunggu')";
        mysqli_query($conn, $query);

        $query = "INSERT INTO pasien
                    VALUES ('$nik', '$nama', '$kelamin', '$kabupaten', '$kecamatan', '$tgl_lahir')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    // Daftar Berobat
    function daftar_berobat($data){
        global $conn;

        $poli = htmlspecialchars($data["poli"]); 
        $nik = htmlspecialchars($data["id"]);      
        $tgl_berobat = htmlspecialchars($data["tgl_berobat"]);

        $query = "INSERT INTO berobat
                    VALUES ('', '$nik', '$poli', '$tgl_berobat', 'Menunggu')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    // Daftar Pegawai
    function tambah_pegawai($data){
        global $conn;

        $nip = htmlspecialchars($data["nip"]); 
        $nama = htmlspecialchars(stripslashes(ucwords($data["nama"])));      
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
        $jabatan = htmlspecialchars($data["jabatan"]); 
        $provinsi = htmlspecialchars(stripslashes(ucwords($data["provinsi"]))); 
        $kabupaten = htmlspecialchars(stripslashes(ucwords($data["kabupaten"])));      
        $kecamatan = htmlspecialchars(stripslashes(ucwords($data["kecamatan"])));
        $kelamin = htmlspecialchars($data["kelamin"]); 

        $query = "INSERT INTO pegawai
                    VALUES ('$nip', '$nama', '$jabatan', '$tgl_lahir', '$provinsi', '$kabupaten', '$kecamatan', '$kelamin')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    // ========== 2. Read (CRUD) ========== //

    //Search Pelayanan Pasien 
    function cari($keyword){
        $query = "SELECT * FROM berobat b 
                    JOIN pasien p ON p.nik = b.nik
                    WHERE nama LIKE '%$keyword%'
                    OR p.nik LIKE '%$keyword%'
                    OR poli LIKE '%$keyword%'
                    ORDER BY tgl_berobat DESC
                    "; 
        return query($query);
    }

    //Search Pegawai
    function cari_pegawai($keyword){
        $query = "SELECT * FROM pegawai
                    WHERE nama LIKE '%$keyword%'
                    OR nip LIKE '%$keyword%'
                    ORDER BY nama
                    "; 
        return query($query);
    }

    //Search Pendaftaran Pasien
    function cek($keyword){
        $query = "SELECT * FROM pasien
                    WHERE nama LIKE '%$keyword%'
                    OR nik LIKE '%$keyword%'
                    "; 
        return query($query);
    }

    // ========== 3. Update (CRUD) ========== //
    
    //Update data pasien
    function update_pasien($data){
        global $conn;

        $id = $data["id"];
        $nik = htmlspecialchars($data["nik"]);
        $nama = htmlspecialchars(stripslashes(ucwords($data["nama"])));
        $kelamin = htmlspecialchars($data["kelamin"]);
        $kabupaten = htmlspecialchars(stripslashes(ucwords($data["kabupaten"])));      
        $kecamatan = htmlspecialchars(stripslashes(ucwords($data["kecamatan"])));      
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
        $query = "UPDATE pasien SET 
                    nama = '$nama',
                    nik = '$nik',
                    kabupaten = '$kabupaten',
                    kecamatan = '$kecamatan',
                    kelamin = '$kelamin',
                    tgl_lahir = '$tgl_lahir'
                    WHERE nik = $id
                    ";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

      //Update data berobat
      function update_pelayanan($data){
        global $conn;

        $id = $data["id"];
        $poli = htmlspecialchars($data["poli"]);    
        $tgl_berobat = htmlspecialchars($data["tgl_berobat"]);
        $query = "UPDATE berobat SET 
                    poli = '$poli',
                    tgl_berobat = '$tgl_berobat'
                    WHERE id_berobat = $id
                    ";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }



    //Update data pegawai
    function update_pegawai($data){
        global $conn;

        $id = $data["id"];
        $nip = htmlspecialchars($data["nip"]);
        $nama = htmlspecialchars(stripslashes(ucwords($data["nama"])));
        $tgl_lahir = htmlspecialchars(stripslashes(ucwords($data["tgl_lahir"])));      
        $jabatan = htmlspecialchars($data["jabatan"]);      
        $provinsi = htmlspecialchars(stripslashes(ucwords($data["provinsi"])));
        $kabupaten = htmlspecialchars(stripslashes(ucwords($data["kabupaten"])));      
        $kecamatan = htmlspecialchars(stripslashes(ucwords($data["kecamatan"])));       
        $kelamin = htmlspecialchars($data["kelamin"]);
        
        $query = "UPDATE pegawai SET 
                    nip = '$nip',
                    nama = '$nama',
                    tgl_lahir = '$tgl_lahir',
                    jabatan = '$jabatan',
                    provinsi = '$provinsi',
                    kabupaten = '$kabupaten',
                    kecamatan = '$kecamatan',
                    kelamin = '$kelamin'
                    WHERE nip = $id
                    ";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    // Update Status Pelayanan
    function update_status($data){
        global $conn;

        $id = $data["id"];
        if($data["tindakan"] == 'Menunggu'){
            $query = "UPDATE berobat SET 
                    tindakan = 'Selesai'
                    WHERE id_berobat = $id
                    ";
            mysqli_query($conn, $query);
        }

        elseif($data["tindakan"] == 'Selesai'){
            $query = "UPDATE berobat SET 
                    tindakan = 'Menunggu'
                    WHERE id_berobat = $id
                    ";
            mysqli_query($conn, $query);
        }
        return mysqli_affected_rows($conn);
    }

    // ========== 4. Delete Data (CRUD) ========== //

    //Delete pasien
    function hapus_pasien($id){
        global $conn;

        $query =  "DELETE FROM pasien WHERE nik = $id";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    //Delte Pegawai
    function hapus_pegawai($id){
        global $conn;

        $query =  "DELETE FROM pegawai WHERE nip = $id";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    //Delete Data Berobat
    function hapus_pelayanan($id){
        global $conn;

        $query =  "DELETE FROM berobat WHERE id_berobat = $id";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }


?>