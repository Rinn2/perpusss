
<?php
$host = "localhost"; // Ganti dengan host database Anda
$user = "root";      // Ganti dengan username database Anda
$pass = "";          // Ganti dengan password database Anda
$db   = "data_perpus"; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
