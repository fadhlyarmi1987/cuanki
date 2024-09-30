<?php
session_start();
include "koneksi.php";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? htmlentities($_POST['password']) : "";

// echo ($password);
if (!empty($_POST['submit_validate'])) {
    $query = mysqli_query($koneksi, "SELECT * FROM tb_user Where username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        $_SESSION['cuanki_viral'] = $username;
        $_SESSION['level_cuanki'] = $hasil['level'];
        header('location:../home');
    } else { ?>
        <script>
            alert('username/password salah')
            window.location = '../login'
        </script>
<?php
    }
}
?>