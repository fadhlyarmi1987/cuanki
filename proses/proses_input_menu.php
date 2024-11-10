<?php
include "koneksi.php";

$nama_menu = isset($_POST['nama_menu']) ? htmlentities($_POST['nama_menu']) : "";
$Keterangan = isset($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : "";
$kategori_menu = isset($_POST['kategori']) ? htmlentities($_POST['kategori']) : "";
$harga = isset($_POST['harga']) ? htmlentities($_POST['harga']) : "";
$stok = isset($_POST['stok']) ? htmlentities($_POST['stok']) : "";

$kode_rand = rand(10000, 99999) . "-";
$target_dir = "../Assets/img/" . $kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['input_menu_validate'])) {
    // Cek apakah file adalah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf, file yang di masukan telah ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { // 500kb
                $message = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            } else {
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Maaf, hanya gambar dengan format JPG, PNG, JPEG, GIF yang diperbolehkan";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        // Jika gagal upload
        echo '
        <html>
        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: "Gagal!",
                    text: "' . $message . ', gambar tidak dapat diupload.",
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
    } else {
        // Cek jika nama menu sudah ada
        $select = mysqli_query($koneksi, "SELECT * FROM tb_daftar_menu WHERE nama_menu= '$nama_menu'");
        if (mysqli_num_rows($select) > 0) {
            echo '
            <html>
            <head>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: "Gagal!",
                        text: "Nama menu yang dimasukkan telah ada.",
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
        } else {
            // Proses upload dan masukkan data ke database
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($koneksi, "INSERT INTO tb_daftar_menu (foto, nama_menu, keterangan, kategori, harga, stok) VALUES ('" . $kode_rand . $_FILES['foto']['name'] . "', '$nama_menu', '$Keterangan', '$kategori_menu', '$harga', '$stok')");
                if ($query) {
                    echo '
                    <html>
                    <head>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    </head>
                    <body>
                        <script>
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil dimasukkan.",
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
                                text: "Data gagal dimasukkan.",
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
                            text: "Maaf, terjadi kesalahan. File tidak dapat diupload.",
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
    }
}
?>
