<?php
$host = "localhost";   // server database
$user = "root";        // username database
$pass = "";            // password database
$db   = "db_bukutamu";   // nama database

$conn = new mysqli($host, $user, $pass, $db);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
