<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email='$email'"
    );

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        if(password_verify($password, $data['password'])){

            $_SESSION['user_id'] = $data['id'];
            $_SESSION['nama'] = $data['name'];
            $_SESSION['role'] = $data['role'];

            header("Location:index.php");

            exit;

        } else {
            echo "<script>alert('Password salah!');</script>";
        }

    } else {
        echo "<script>alert('Email tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login CourtHub</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

    <div class="cover">
        <h1>COURTHUB</h1>
        <h2>BOOKING LAPANGAN OLAHRAGA</h2>
        <p>Padel • Futsal • Badminton</p>

        <img src="assets/images/courts.jpeg" alt="Court Image">

        <ul>
            <li>✔ Booking Mudah & Cepat</li>
            <li>✔ Jadwal Real-time</li>
            <li>✔ Pembayaran Aman</li>
            <li>✔ Layanan 24/7</li>
        </ul>
    </div>

    <div class="login-box">
        <form method="POST">

            <h2>Login</h2>
            <p>Selamat datang kembali</p>

            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <div>
                <input type="checkbox" name="remember">
                <label>Ingat saya</label>
            </div>

            <button type="submit" name="login">Login</button>

            <p>
                Belum punya akun?
                <a href="register.php">Daftar sekarang</a>
            </p>

        </form>
    </div>

</div>

</body>
</html>