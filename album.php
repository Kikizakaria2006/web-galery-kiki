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
    <title>index</title>
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
         
          <a class="btn btn-outline-success me-1" href="home.php">Kembali</a>
      </ul>
      </div>
  </div>
</nav>

  <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">

                <form action="tambah_album.php" method="post">
        <table>
            <tr><td>Nama Album</td></tr>
                <tr><td><input class="form-control" type="text" name="namaalbum"></td></tr>
            <tr><td>Deskripsi</td></tr>
                <tr><td><input class="form-control" type="text" name="deskripsi"></td></tr>
            <tr><td></td></tr>
                <tr><td><input type="submit" value="tambah" class="btn btn-success"></td></tr>
        </table>
    </form>
            
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data Album</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                             <th>ID</th>
                             <th>Nama</th>
                             <th>Deskripsi</th>
                             <th>Tanggal Di Buat</th>
                             <th>Aksi</th>
                        </tr>
                        </thead>
                            <tbody>
                                <tr>
                                <?php
        include 'koneksi.php';
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
            <td><?=$data['albumid']?></td>
            <td><?=$data['namaalbum']?></td>
            <td><?=$data['deskripsi']?></td>
            <td><?=$data['tanggaldibuat']?></td>
            <td>
                <a href="hapus_album.php?albumid=<?=$data['albumid']?>" class="btn btn-danger">Hapus</a>
                <a href="edit_album.php?albumid=<?=$data['albumid']?>" class="btn btn-primary">Edit</a>
            </td>
        </tr>
        <?php
        }
        ?>
                                </tr>
                            </tbody>
                        </table> 
                </div>
            </div>
        </div>
    </div>
  </div>

<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom text-white">
        <p>&copy; UKK RPL 2024 | Kiki Zakaria</p>
    </footer>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>