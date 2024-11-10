<?php
include "koneksi.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama_menu = isset($_POST['nama_menu']) ? htmlentities($_POST['nama_menu']) : "";
$keterangan = isset($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : "";
$kategori_menu = isset($_POST['kategori']) ? htmlentities($_POST['kategori']) : "";
$harga = isset($_POST['harga']) ? htmlentities($_POST['harga']) : "";
$stok = isset($_POST['stok']) ? htmlentities($_POST['stok']) : "";

// Cek apakah ada file gambar yang diunggah
if (!empty($_FILES['foto']['name'])) {
    $kode_rand = rand(10000, 99999) . "-";
    $target_dir = "../Assets/img/" . $kode_rand;
    $target_file = $target_dir . basename($_FILES['foto']['name']);
    $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file yang diunggah adalah gambar
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if ($_FILES['foto']['size'] > 500000) { 
            $message = "File Foto yang diupload terlalu Besar";
            $statusUpload = 0;
        } elseif (!in_array($imageType, array("jpg", "png", "jpeg", "gif"))) {
            $message = "Maaf, hanya memiliki gambar dengan format JPG, PNG, JPEG, GIF";
            $statusUpload = 0;
        }
    }

    if ($statusUpload == 0) {
        $message = '<script>alert("' . $message . ', Gambar tidak dapat diupload"); window.location="../menu"</script>';
    } else {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $foto = $kode_rand . $_FILES['foto']['name'];
        } else {
            $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload"); window.location="../menu"</script>';
        }
    }
} else {
    // Jika tidak ada file yang diunggah, maka gunakan foto yang sudah ada
    $foto = "";
}

if (!empty($_POST['input_menu_validate'])) {
    if ($foto !== "") {
        $query = mysqli_query($koneksi, "UPDATE tb_daftar_menu SET foto='$foto', nama_menu='$nama_menu', keterangan='$keterangan', kategori='$kategori_menu', harga='$harga', stok='$stok' WHERE id='$id'");
    } else {
        $query = mysqli_query($koneksi, "UPDATE tb_daftar_menu SET nama_menu='$nama_menu', keterangan='$keterangan', kategori='$kategori_menu', harga='$harga', stok='$stok' WHERE id='$id'");
    }

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
                    text: "Data berhasil diperbarui.",
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
                    text: "Data gagal diperbarui.",
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

echo $message;
