<?php

include 'koneksi.php';

$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];
$jumlah_order = $_POST['jumlah_order'];
$catatan = $_POST['catatan'];
$pelanggan = $_POST['nama_pelanggan'];  
$meja = $_POST['nomor_meja'];  
$pelayan = 1;  
$status = "Menunggu";  
$kode_order = 'ORD-' . time();

$query = "INSERT INTO orders (kode_order, pelanggan, meja, pelayan, status, waktu_order)
          VALUES ('$kode_order', '$pelanggan', '$meja', '$pelayan', '$status', NOW())";

if (mysqli_query($koneksi, $query)) {
    
    $id_order = mysqli_insert_id($koneksi);

   
    $query_detail = "INSERT INTO order_details (id_order, id_menu, nama_menu, harga, jumlah, catatan, pelanggan)
                     VALUES ('$id_order', '$id_menu', '$nama_menu', '$harga', '$jumlah_order', '$catatan', '$pelanggan')";

    if (mysqli_query($koneksi, $query_detail)) {
        
        echo '
        <html>
        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: "Berhasil!",
                    text: "Pesanan berhasil diorder!",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "../menu";
                    }
                });
            </script>
        </body>
        </html>';
    } else {
        
        echo '
        <html>
        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: "Gagal!",
                    text: "Gagal order pesanan",
                    icon: "error",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "../menu";
                    }
                });
            </script>
        </body>
        </html>';
    }
} else {
    
    echo '
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "Gagal order pesanan!",
                icon: "error",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "../menu";
                }
            });
        </script>
    </body>
    </html>';
}

?>
