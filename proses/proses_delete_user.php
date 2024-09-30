<?php
include "koneksi.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id='$id'");
    if (!$query) {
        $message = '<script>alert("Data Gagal Dihapus");
        
        </script>';
        
    } else {
        $message = '<script>alert("Data Berhasil Dihapus");
        window.location="../user"</script>';
    }
}
echo $message;
?>