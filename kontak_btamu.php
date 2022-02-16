
<?php
include './config.php';

$nama =  $_POST['nama'];
$phone = $_POST['phone'];
$instansi =  $_POST['instansi'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

      $query = "INSERT INTO btamu
      (id, nama, phone, instansi, email, pesan)
      VALUES
      ('$id','$nama', '$phone', '$instansi', '$email', '$pesan')";
    
$sql = mysqli_query($conn, $query);
		if($sql){
			header("location:kontak.php");
			echo "Berhasil ditambahkan";
		}else{
			echo "Maaf Terjadi Kesalahan";
		}
?>