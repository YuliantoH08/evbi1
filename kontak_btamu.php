
<?php
include './config.php';

$tfname =  $_POST['tfname'];
$tlname = $_POST['tlname'];
$phone = $_POST['phone'];
$instansi =  $_POST['instansi'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

      $query = "INSERT INTO btamu
      (id, tfname, tlname, phone, instansi, email, pesan)
      VALUES
      ('$id','$tfname', '$tlname', '$phone', '$instansi', '$email', '$pesan')";
    
$sql = mysqli_query($conn, $query);
		if($sql){
			header("location:kontak.php");
		}else{
			echo "Maaf Terjadi Kesalahan";
		}
?>