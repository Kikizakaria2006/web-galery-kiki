<?php
include "koneksi.php";
session_start();

$namaalbum=$_POST["namaalbum"];
$deskripsi=$_POST["deskripsi"];
$tanggaldibuat=date ("y-m-d");
$userid=$_SESSION["userid"];

$sql=mysqli_query($conn, "INSERT INTO album VALUES('','$namaalbum','$deskripsi','$tanggaldibuat','$userid')");

echo "<script>
alert ('data telah di tambahkan');
location.href='album.php';
</script>";
?>