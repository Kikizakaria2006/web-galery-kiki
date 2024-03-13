<?php
session_start();
$userid=$_SESSION['userid'];
include "koneksi.php";
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Gallery Foto</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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
        <a href="album.php" class="btn btn-inline-dark mt-1 text-white">Album</a>
        <a href="foto.php" class="btn btn-inline-dark mt-1 text-white">Foto</a>
      <ul class="navbar-nav me-auto">  
          <a href="logout.php" class="btn btn-outline-danger">Logout</a>
      </ul>
      </div>
  </div>
</nav>

<div class="container mt-3">
        <div class="row">
            <?php
            $query = mysqli_query($conn, "SELECT * from foto inner join user on foto.userid=user.userid inner join album on foto.albumid=album.albumid");
            while ($data = mysqli_fetch_array($query)) { ?>
            <div class="col-md-3 mt-3">
                <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
                    <div class="card">
                        <img src="gambar/<?php echo $data['lokasifile'] ?>" alt="foto" class="card-img-top"
                            title="<?php echo $data['judulfoto'] ?>" style="height: 18rem;">
                        <div class="card-footer text-center">
                            <?php
                                $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                            <a href="proses_like2.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                                name="batalsuka"><i class="fa fa-heart"></i></a>
                            <?php } else { ?>
                            <a href="proses_like2.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                                name="suka"><i class="fa-regular fa-heart"></i></a>
                            <?php }
                                $like = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($like) . ' Suka';
                                ?>
                            |
                            <a href="#" type="button" data-bs-toggle="modal"
                                data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
                                <i class="fa-regular fa-comment"></i>
                            </a>
                            <?php
                                $jmlkomen = mysqli_query($conn, "select * from komentarfoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($jmlkomen) . ' Komentar';
                                ?>
                        </div>
                    </div>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="home.php">
                                            <img src="gambar/<?php echo $data['lokasifile'] ?>" alt="foto"
                                                class="card-img-top" title="<?php echo $data['judulfoto'] ?>"
                                                style="height: 500px;">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <div class="overflow-auto">
                                                <div class="sticky-top">
                                                    <strong><?php echo $data['judulfoto'] ?></strong>
                                                    <span
                                                        class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                                                    <span
                                                        class="badge bg-secondary"><?php echo $data['tanggaldibuat'] ?></span>
                                                    <span
                                                        class="badge bg-secondary"><?php echo $data['namaalbum'] ?></span>
                                                </div>
                                                <hr>
                                                <p align="left">
                                                    <?php echo $data['deskripsifoto'] ?>
                                                </p>
                                                <hr>
                                                <?php
                                                    $fotoid = $data['fotoid'];
                                                    $komentar = mysqli_query($conn, "select * from komentarfoto inner join user on komentarfoto.userid=user.userid where komentarfoto.fotoid='$fotoid'");
                                                    while ($row = mysqli_fetch_array($komentar)) {
                                                    ?>
                                                <p align="left d-grid">
                                                    <strong><?php echo $row['namalengkap'] ?> :</strong>
                                                    <?php echo $row['isikomentar'] ?>

                                                </p>

                                                <?php } ?>
                                                <hr>
                                                <div class="sticky-bottom">
                                                    <form action="proses_komentar.php" method="post">
                                                        <div class="">
                                                            <input type="hidden" name="fotoid"
                                                                value="<?php echo $data['fotoid'] ?>">
                                                            <textarea rows="5" name="isikomentar" class="form-control"
                                                                placeholder="Tambah Komentar..."></textarea>
                                                            <div class="mt-2">
                                                                <button type="submit" name="kirimkomentar"
                                                                    class="btn btn-outline-primary">Kirim</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
    <footer class="d-flex justify-content-center border-top mt-3 text-white">
        <p>&copy; UKK RPL 2024 | Kiki Zakaria</p>
    </footer>

    <script type="" src="asset/js/bootstrap.min.js"></script>
</body>
</html>