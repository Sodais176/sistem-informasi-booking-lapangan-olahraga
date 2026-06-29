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

<form method="POST">

    <h2>Login Akun</h2>
    <p>Selamat datang kembali</p>

    <label>Email</label>
    <input type="email" name="email" placeholder="Masukkan email" required>

    <br><br>

    <label>Password</label>
    <input type="password" name="password" placeholder="Masukkan password" required>

    <br><br>

    <div>
        <input type="checkbox" name="remember">
        <label>Ingat saya</label>
    </div>

    <button type="submit" name="login">Login</button>

    <p>
        Belum punya akun?
        <a href="register.php">Daftar</a>
    </p>

</form>