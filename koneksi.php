<?php
  $host ="localhost"; //host server
  $user ="root"; //user login phpMyAdmin
  $pass =""; //pass login phpMyAdmin
  $db ="wedding"; //nama database
  $conn = mysqli_connect($host, $user, $pass, $db);

  // Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
  
?>