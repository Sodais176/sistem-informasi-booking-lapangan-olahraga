<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $id              = $_POST['id'];
    $nama            = $_POST['nama'];
    $booking_id      = $_POST['booking_id'];
    $payment_method  = $_POST['payment_method'];
    $nominal         = $_POST['nominal'];
    $catatan         = $_POST['catatan'];
    $status          = "Pending";

    // Upload file
    $bukti_transfer = $_FILES['bukti_transfer']['name'];
    $tmp = $_FILES['bukti_transfer']['tmp_name'];

    move_uploaded_file(
        $_FILES['bukti_transfer']['tmp_name'],
        "uploads/" . $_FILES['bukti_transfer']['name']
    );

    $query = mysqli_query($conn,
    "INSERT INTO payments
    (id,booking_id,nama,payment_method,nominal,bukti_transfer,catatan,status)
    VALUES
    ('$id','$booking_id','$nama','$payment_method','$nominal','$bukti_transfer','$catatan','$status')"
    );

    if($query){
        echo "
        <script>
            alert('Pembayaran berhasil diupload!');
            window.location='report.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Pembayaran gagal!');
            window.location='payment.html';
        </script>
        ";
    }

}
?>