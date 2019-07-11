<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT TotalBuku(".$_GET['id_penerbit'].")");
			$hasil = mysqli_fetch_row($result);
			echo $hasil[0];
?>