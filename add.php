<?php
include "config.php";
?>
<html>
<head>  
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Buku</title>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

            <!-- Header -->
            <header id="header">
              <div class="logo">
                <a href="home.php">Perpustakaan</a>
              </div>
            </header>

        <br/><br/>
    <form action="add.php" method="post" name="form1">
    <table>
    <tr> 
        <td>ID buku :</td>
        <td><input type="text" name="id_buku"></td>
    </tr>
    <tr>
        <td>Kategori:</td>   
        <td>
        <select name="id_kategori">
            <?php
            include "config.php";
            $result = mysqli_query($mysqli, "SELECT * FROM kategori ORDER BY id_kategori ASC");
            while ($qtabel = mysqli_fetch_assoc($result))
            {
                echo '<option value="'.$qtabel['id_kategori'].'">'.$qtabel['kategori'].'</option>';             
            }
            ?>
        </select>
        </td>   
    </tr>
    <tr> 
        <td>Judul :</td>
        <td><input type="text" name="judul"></td>
    </tr>
    <tr> 
        <td>Penulis :</td>
        <td><input type="text" name="penulis"></td>
    </tr>
    <tr> 
        <td></td>
        <td><input type="submit" name="Submit" value="Tambah"></td>
    </tr>
    </table>
    </form>

    <?php
    // Check If form submitted, insert form data into buku table.
    if(isset($_POST['Submit'])) {
        $id_buku = $_POST['id_buku'];
        $id_kategori = $_POST['id_kategori'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        // include database connection file
        include_once("config.php");
        // Insert buku data into table
        $result = mysqli_query($mysqli, "INSERT INTO buku(id_buku,id_kategori,judul,penulis) VALUES('$id_buku','$id_kategori','$judul','$penulis')");
        // Show message when buku added
        echo "Buku Berhasil Ditambahkan !!. <a href='buku.php'>Lihat Daftar</a>";
    }
    ?>
     <section class="contact-form">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-5">
                    <form id="contact" action="" method="post">

                    </form> 
                  </div>

                </div>
              </div>

          </div>
        </div>



        <div id="sidebar">

          <div class="inner">

    
            <nav id="menu">
              <ul>
                <li><a href="home.php">Homepage</a></li>
                <li><a href="buku.php">Data Buku</a></li>
                <li><a href="penulis.php">Penulis</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="index.php">Logout</a></li>    
              </ul>
            </nav>

            <!-- Featured Posts -->
            

          </div>
        </div>

    </div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>