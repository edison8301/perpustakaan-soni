<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that kategori
$id_penulis = $_GET['id_penulis'];

// Delete kategori row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM penulis WHERE id_penulis=$id_penulis");

// After delete redirect to Home, so that latest kategori list will be displayed.
header("Location:penulis.php");
?>