
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>

  <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">

                <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>deskripsi foto</td>
                <td><input type="text" name="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php 
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                         ?>
                         <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                         <?php
                     }
                          ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="tambah" class="btn btn-success"></td>
            </tr>
        </table>
    </form>
            
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data Foto</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>deskripsi foto</th>
            <th>Tanggal ungah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn, "SELECT * FROM foto,album WHERE foto.userid='$userid' AND foto.albumid=album.albumid");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
            <td><?=$data['fotoid']?></td>
            <td><?=$data['judulfoto']?></td>
            <td><?=$data['deskripsifoto']?></td>
            <td><?=$data['tanggaldibuat']?></td>
            <td><img src="gambar/<?php echo $data['lokasifile']?>" width="100px"></td>
            <td><?=$data['namaalbum']?></td>
            <td>
                <a class="btn btn-danger" href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                <a class="btn btn-primary" href="edit_foto.php?fotoid=<?=$data['fotoid']?>"><i class="bi bi-pencil-square"></i></a>
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
  </div>
    </div>
</div>
<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom text-light">
        <p>&copy; UKK RPL 2024 | Kiki Zakaria</p>
    </footer>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>

