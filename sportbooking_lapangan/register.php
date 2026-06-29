<?php
include "koneksi.php";

if(isset($_POST['register'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // cek password sama atau tidak
    if($password != $confirm_password){
        echo "<script>alert('Konfirmasi password tidak cocok!');</script>";
    } else {

        // cek email sudah terdaftar atau belum
        $cek = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($cek) > 0){

            echo "<script>alert('Email sudah terdaftar!');</script>";

        } else {

            // hash password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // simpan ke database
            mysqli_query(
                $conn,
                "INSERT INTO users
                (name, email, phone, password, role, remember_token, created_at, updated_at)
                VALUES
                (
                    '$name',
                    '$email',
                    '$phone',
                    '$hash',
                    'member',
                    NULL,
                    NOW(),
                    NOW()
                )"
            );

            echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
        }
    }
}
?>

<form method="POST">

    <h2>Register Akun</h2>

    <label>Nama</label>
    <input type="text" name="name" placeholder="Masukkan nama" required>

    <br><br>

    <label>Email</label>
    <input type="email" name="email" placeholder="Masukkan email" required>

    <br><br>

    <label>No HP</label>
    <input type="text" name="phone" placeholder="Masukkan nomor HP" required>

    <br><br>

    <label>Password</label>
    <input type="password" name="password" placeholder="Masukkan password" required>

    <br><br>

    <label>Konfirmasi Password</label>
    <input type="password" name="confirm_password" placeholder="Ulangi password" required>

    <br><br>

    <button type="submit" name="register">Register</button>

    <p>
        Sudah punya akun?
        <a href="login.php">Login</a>
    </p>

</form>