proses-register.php
<?php 
include 'koneksi.php';

$username = $_POST['username'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql=mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$namalengkap','$alamat','$email','$password')");

if ($sql) {
    echo "<script>
    alert('pendaftaran akun berhasil');
    location.href='login.php';
    </script>";
}

 ?>