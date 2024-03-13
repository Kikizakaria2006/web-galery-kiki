
 <?php
$host = "localhost"; 
$username = "root";
$password = ""; 
$database = "db_galeri"; 

// Membuat koneksi
$conn =mysqli_connect("localhost", "root", "", "db_galeri");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "Koneksi berhasil";

// Lakukan operasi database atau query lainnya di sini

// Menutup koneksi setelah selesai
$conn->close();
 ?>