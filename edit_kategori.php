<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for kategori update, then redirect to homepage after update
if(isset($_POST['update']))
{  
    $id_kategori=$_POST['id_kategori'];
    $kategori=$_POST['kategori'];

    // update kategori data
    $result = mysqli_query($mysqli, "UPDATE kategori SET id_kategori='$id_kategori', kategori='$kategori' WHERE id_kategori=$id_kategori");

    // Redirect to homepage to display updated kategori in list
    header("Location: kategori.php");
}
?>
<?php
// Display selected kategori data based on id
// Getting id from url
$id_kategori = $_GET['id_kategori'];
// Fetech kategori data based on id
$result = mysqli_query($mysqli, "SELECT * FROM kategori WHERE id_kategori=$id_kategori");
while($data_kategori = mysqli_fetch_array($result))
{
    $id_kategori = $data_kategori['id_kategori'];
    $kategori = $data_kategori['kategori'];
}
?>
<html>
<head>  
    <head>  
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Kategori</title>
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

    <form name="update_kategori" method="post" action="edit_Kategori.php">
        <table border="0">
            <tr> 
                <td>ID Kategori:</td>
                <td><input type="text" name="id_kategori" value=<?php echo $id_kategori;?>></td>
            </tr>
            <tr> 
                <td>Kategori:</td>
                <td><input type="text" name="kategori" value=<?php echo $kategori;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_kategori" value=<?php echo $_GET['id_kategori'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
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
                <li><a href="peminjaman.php">Peminjaman</a></li>
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