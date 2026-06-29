<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Sport Booking</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header>

        <nav>
            <a href="index.php">Home</a>
            <a href="courts.html">Lapangan</a>
            <a href="booking.html">Booking</a>
            <a href="payment.html">Payment</a>
            <a href="report.php">Laporan</a>
            <a href="dashboard.html">Grafik Transaksi</a>
            <a href="about.html">About</a>
        </nav>
    </header>

    <h1>LAPORAN DATA BOOKING</h1>

    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Sport</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Total</th>
        </tr>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM bookings");

    while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?= $data['id']; ?></td>
        <td><?= $data['nama']; ?></td>
        <td><?= $data['email']; ?></td>
        <td><?= $data['sport']; ?></td>
        <td><?= $data['tanggal']; ?></td>
        <td>
            <?= $data['jam_mulai']; ?>
            -
            <?= $data['jam_selesai']; ?>
        </td>
        <td><?= $data['total']; ?></td>
    </tr>
    <?php } ?>
    </table>

    <br><br>

    <h1>LAPORAN DATA PEMBAYARAN</h1>

    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Booking ID</th>
            <th>Nama</th>
            <th>Metode</th>
            <th>Nominal</th>
            <th>Bukti</th>
            <th>Status</th>
        </tr>

    <?php
    $query2 = mysqli_query($conn, "SELECT * FROM payments");

    while($pay = mysqli_fetch_array($query2)){
    ?>
    <tr>
        <td><?= $pay['id']; ?></td>
        <td><?= $pay['booking_id']; ?></td>
        <td><?= $pay['nama']; ?></td>
        <td><?= $pay['payment_method']; ?></td>
        <td>Rp <?= number_format($pay['nominal']); ?></td>
        <td>
            <img src="uploads/<?php echo $pay['bukti_transfer']; ?>"
            width="100">
        </td>
        <td><?= $pay['status']; ?></td>
    </tr>
    <?php } ?>
    </table>

</body>
</html>