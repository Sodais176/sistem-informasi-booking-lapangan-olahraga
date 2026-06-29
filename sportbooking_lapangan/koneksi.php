<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "sportbooking"
);

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>