<?php 
    require '../conf/function.php';
    $id = $_GET["id"];

    $data = query("SELECT * FROM berobat
					WHERE id_berobat = $id")[0]
                ;
       
    if(isset($_POST["klik"])){
		if(update_status($_POST) > 0){
			echo "<script>				
              document.location.href = 'pelayanan.php'
            </script>";
		}
		else{
			echo mysqli_error($conn);
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
    <body>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $data["id_berobat"]; ?>">
            <input type="hidden" name="tindakan" value="<?= $data["tindakan"]; ?>">
            <button name="klik" id="klik" type="submit" onclick="test()" class="btn btn-primary" hidden>Edit</button>
        </form>  
    </body> 

    <script>
      window.onload = function(){
        document.getElementById('klik').click();
      }
    </script>

</html>