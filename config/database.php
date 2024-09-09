<?php 

include_once "../variabel.php";

$connection = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_error()) {
   echo "Gagal melakukan koneksi ke database";
   die;
}

?>