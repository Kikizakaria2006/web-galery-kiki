<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
          <a class="btn btn-outline-success me-1" href="login.php">Login</a>
          <a class="btn btn-outline-danger" href="registrasi.php">Daftar</a>
      </ul>
     </div>
  </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h5>Login</h5>
                    </div>              
                 <form action="proses_login.php" method="post">
          <label class="form-label">Username</label>
          <input class="form-control" type="text" name="username" required>
          <label class="form-label">Password</label>
          <input class="form-control" type="password" name="password" required>
          <div class="mt-2 text-center">
            <button class="btn btn-success" name="kirim">Login</button>
          </div>
          <hr>
          Tidak Punya Akun?<a href="registrasi.php">Daftar</a>
                 </form>
               </div>
            </div>
        </div>
    </div>
</div>
 
<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom text-light">
        <p>&copy; UKK RPL 2024 | Kiki Zakaria</p>
    </footer>
    <script type="text/javascript" srcref="asset/js/bootstrap.min.js"></script>
</body>
</html>