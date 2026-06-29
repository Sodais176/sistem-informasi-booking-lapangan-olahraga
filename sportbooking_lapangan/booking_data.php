<?php
include "koneksi.php";

if(isset($_POST['submit'])){

    $id         = $_POST['id'];
    $nama       = $_POST['nama'];
    $email      = $_POST['email'];
    $sport      = $_POST['sport'];
    $tanggal    = $_POST['tanggal'];
    $jam_mulai  = $_POST['jam_mulai'];
    $jam_selesai= $_POST['jam_selesai'];
    $total      = $_POST['total'];

    $query = mysqli_query($conn,
    "INSERT INTO bookings
    (id,nama,email,sport,tanggal,jam_mulai,jam_selesai,total)
    VALUES
    ('$id','$nama','$email','$sport','$tanggal','$jam_mulai','$jam_selesai','$total')"
    );

    if($query){
        echo "
        <script>
            alert('Booking berhasil!');
            window.location='payment.html';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Booking gagal!');
            window.location='booking.html';
        </script>
        ";
    }

}
?>