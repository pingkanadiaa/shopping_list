<?php
include('config/database.php');

// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "shopping_list";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
