<?php
include "koneksi.php";
?>

<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Booking</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <h2>Selamat datang, <?php echo $_SESSION['nama']; ?></h2>
    <p>Role: <?php echo $_SESSION['role']; ?></p>

    <header>
        <h1>SISTEM INFORMASI BOOKING LAPANGAN OLAHRAGA</h1>
        <h1>(Padel, Futsal, dan Badminton)</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="courts.html">Lapangan</a>
            <a href="booking.html">Booking</a>
            <a href="payment.html">Payment</a>
            <a href="report.php">Laporan</a>
            <a href="dashboard.html">Grafik Transaksi</a>
            <a href="about.html">About</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero">
        <h2>Booking Lapangan Padel, Futsal, dan Badminton</h2>
        <p>Mudah, cepat, dan aman.</p>

        <div class="hero-buttons">
            <a href="booking.html" class="btn">Mulai Booking</a>
            <a href="courts.html" class="btn">Lihat Lapangan</a>
        </div>
    </section>
    
    <!-- STATISTIK -->
    <section class="stats">
        <div class="stat-box">
            <h3>150+</h3>
            <p>Total Booking</p>
        </div>

        <div class="stat-box">
            <h3>3</h3>
            <p>Jenis Olahraga</p>
        </div>
        
    </section>

    <!-- SPORTS -->
    <section class="sports">
        
        <div class="card">
            <img src="assets/images/futsal.jpeg">
            <h3>Futsal</h3>

            <video controls width="300">
                <source src="assets/videos/futsal.mp4" type="video/mp4">
            </video>

            <a href="booking.html">Booking</a>
        </div>

        <div class="card">
            <img src="assets/images/padel.jpeg">
            <h3>Padel</h3>

            <video controls width="300">
                <source src="assets/videos/padel.mp4" type="video/mp4">
            </video>

            <a href="booking.html">Booking</a>
        </div>

        <div class="card">
            <img src="assets/images/badminton.jpg">
            <h3>Badminton</h3>

            <video controls width="300">
                <source src="assets/videos/badminton.mp4" type="video/mp4">
            </video>

            <a href="booking.html">Booking</a>
        </div>

    </section>

    <!-- PROMO -->
    <section class="promo">
        <h2>Promo Minggu Ini</h2>
        <p>Diskon 20% untuk booking pertama!</p>
    </section>

    <!-- TESTIMONI -->
    <section class="testimonial">

        <h2>Testimoni User</h2>

        <form id="testimonialForm">

            <input type="text" id="username" placeholder="Masukkan nama" required>

            <textarea id="comment" placeholder="Masukkan testimoni" required></textarea>

            <div class="kepuasan-box">

                <h3>Tingkat Kepuasan User</h3>

                <div id="kepuasanPersen">0%</div>

                <div class="progress">
                    <div id="kepuasanBar"></div>
                </div>

            </div>

            <select id="rating" required>
                <option value="">Pilih Rating</option>
                <option value="⭐">⭐</option>
                <option value="⭐⭐">⭐⭐</option>
                <option value="⭐⭐⭐">⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</option>
            </select>

            <button type="submit">
                Kirim Testimoni
            </button>

        </form>

        <div id="testimonialList" class="testimonial-grid"></div>

    </section>

    <script src="assets/js/testimonial.js"></script>

    <!-- FOOTER -->
    <footer>
        <p>@ 2026 Sport Booking System</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>