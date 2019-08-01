<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that kategori
$id_peminjaman = $_GET['id_peminjaman'];

// Delete kategori row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM peminjaman WHERE id_peminjaman=$id_peminjaman");

// After delete redirect to Home, so that latest kategori list will be displayed.
header("Location:peminjaman.php");
?>