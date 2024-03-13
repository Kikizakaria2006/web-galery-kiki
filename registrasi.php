<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery Foto</title>
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
         
          <a class="nav-link" href="login.php">Login</a>
          <a class="nav-link" href="registrasi.php">Daftar</a>
      </ul>
      </div>
  </div>
</nav>

<div class="container py-5">
     <div class="row justify-content-center">
         <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light ">
                    <div class="text-center">
                        <h5>LOGIN APPLIKASI</h5>
                    </div>
                    <form action="proses_registrasi.php" method="post">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <label class="form-label">Nama lengkap</label>
                        <input type="text" name="namalengkap" class="form-control" required>
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <div class="d-grid mt-2 justify-content-center">
                            <button class="btn btn-primary" type="submit" value="registrasi" name="kirim">Daftar</button>
                        </div>
                    </form>
                    <hr>
                    <p>sudah punya akun? <a href="login.php">masuk</p>
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