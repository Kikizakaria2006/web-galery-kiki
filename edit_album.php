<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
</head>
<style>
nav.navbar{
    background-color: rgb(68, 62, 27);
    text-color:white;
}
footer{
    background-color: rgb(68, 62, 27);
}
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#"><b><i><span class="text-warning">WEB</span> GALERY</i></b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">  
         </div>
          <a class="btn btn-secondary me-1" href="home.php">Home</a>
          <a class="btn btn-secondary me-1" href="album.php">Album</a>
          <a class="btn btn-secondary me-1" href="foto.php">Foto</a>
          <a class="btn btn-danger me-1" href="album.php">Logout</a>
      </ul>
   
  </div>
</nav>

  <div class="container">
    <div class="row">
        <div class="col-md-50">
            <div class="card mt-4">
                <div class="card-header">Edit Data</div>
                <div class="card-body">
    <form action="update_album.php" method="post">
        <?php
        include "koneksi.php";
        $albumid=$_GET['albumid'];
        $sql=mysqli_query($conn,"SELECT * FROM album WHERE albumid='$albumid'");
        while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="albumid" value="<?=$data['albumid']?>"hidden>
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="edit"></td>
            </tr>
        </table>
        <?php
        }
        ?>
    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

    

<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom text-light">
        <p>&copy; UKK RPL 2024 | Kiki Zakaria</p>
    </footer>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>