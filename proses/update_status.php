<?php
include 'koneksi.php'; 

// Ambil id_order dari form yang dikirim
$id_order = $_POST['id_order'];

// Query untuk memperbarui status pesanan menjadi "Selesai"
$query = "UPDATE orders SET status = 'Selesai' WHERE id_order = '$id_order'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, tampilkan SweetAlert dan alihkan ke halaman pesanan
    echo '
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "Pesanan sudah diselesaikan!",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "../order";
                }
            });
        </script>
    </body>
    </html>';
} else {
    // Jika gagal, tampilkan SweetAlert dengan pesan kesalahan
    echo '
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "Gagal memperbarui status pesanan!",
                icon: "error",
                confirmButtonText: "Coba Lagi"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "order.php";
                }
            });
        </script>
    </body>
    </html>';
}
?>
