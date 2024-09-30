<?php
include "koneksi.php";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$password = (isset($_POST['password'])) ? htmlentities($_POST['password']) : "";

if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
    if(mysqli_num_rows($select)>0){
        $message = '<script>alert("Data Gagal Ditambah Karena Username Telah Ada")
                    window.location="../user"
                    </script>';
    }else{
        $query = mysqli_query($koneksi, "INSERT INTO tb_user (nama,username,level,nohp,alamat,password) values ('$name', '$username','$level','$nohp','$alamat','$password')");
    if ($query) {
        $message = '<script>alert("Data Berhasil Ditambah")
                    window.location="../user"
                    </script>';
        
    } else {
        $message = '<script>alert("Data Gagal Ditambah")
                    window.location="../user"
                    </script>';
    }
}
}
echo $message;
?>