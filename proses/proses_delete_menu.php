<?php
include "koneksi.php";
$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['input_user_validate'])) {
    // Memulai transaksi
    mysqli_begin_transaction($koneksi);

    try {
        // Hapus dari tabel order_details
        $query1 = mysqli_query($koneksi, "DELETE FROM order_details WHERE id_menu='$id'");

        // Hapus dari tabel tb_daftar_menu
        $query2 = mysqli_query($koneksi, "DELETE FROM tb_daftar_menu WHERE id='$id'");

        if ($query1 && $query2) {
            // Commit jika kedua operasi berhasil
            mysqli_commit($koneksi);
            echo '
            <html>
            <head>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Data berhasil dihapus",
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
            // Rollback jika ada yang gagal
            mysqli_rollback($koneksi);
            echo '
            <html>
            <head>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: "Gagal!",
                        text: "Data gagal dihapus.",
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
    } catch (Exception $e) {
        // Rollback jika terjadi exception
        mysqli_rollback($koneksi);
        echo '
        <html>
        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: "Error!",
                    text: "Terjadi kesalahan: ' . $e->getMessage() . '",
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
}
?>
