<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_buku = $_GET['id_buku'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM buku WHERE id_buku=$id_buku");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:buku.php");
?>