<?php
include "koneksi.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($koneksi, "DELETE FROM tb_daftar_menu WHERE id='$id'");
    if (!$query) {
        $message = '<script>alert("Data Gagal Dihapus")
                    window.location="../menu"
                    </script>';
    } else {
        $message = '<script>alert("Data Berhasil Dihapus")
                    window.location="../menu"
                    </script>';
    }
}
echo $message;
?>