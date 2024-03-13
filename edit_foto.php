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
    <title>edit foto</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
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
          <a class="btn btn-danger me-1" href="foto.php">kembali</a>
      </ul>
  </div>
</nav>

  <div class="container">
    <div class="row">
        <div class="col-md-50">
            <div class="card mt-4">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">
    <form action="update_foto.php" method="POST" enctype="multipart/form-data">
        <?php
        include "koneksi.php";
        $fotoid=$_GET['fotoid'];
        $sql=mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
        while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>"hidden>
        <table class="table table-success table-striped">
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td>Lokasi file</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php 
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                         ?>
                         <option value="<?=$data2['albumid']?>"
                          <?php 
                          if($data2['albumid']==$data['albumid']){echo'selected';}?>>
                          <?=$data2['namaalbum']?>
                            
                          </option>
                         <?php
                     }
                          ?>
                    </select>
                </td>
            </tr>
            <tr>
            <td></td>
                <td><input type="submit" value="Ubah" class="btn btn-success"></td>
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
   <p>&copy; UKK RPL 2024</p>
</footer>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>