<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that kategori
$id_kategori = $_GET['id_kategori'];

// Delete kategori row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM kategori WHERE id_kategori=$id_kategori");

// After delete redirect to Home, so that latest kategori list will be displayed.
header("Location:kategori.php");
?>