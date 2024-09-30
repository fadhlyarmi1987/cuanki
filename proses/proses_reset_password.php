<?php
include "koneksi.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($koneksi, "UPDATE tb_user SET password='password' WHERE id='$id'");
    if (!$query) {
        $message = '<script>alert("Password Gagal Direset")
        window.location="../user"</script>';

    } else {
        $message = '<script>alert("Password Berhasil Direset")
        window.location="../user"</script>';
    }
}
echo $message;
?>