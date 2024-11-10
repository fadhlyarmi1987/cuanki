<?php
session_start();
include "koneksi.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? htmlentities($_POST['passwordlama']) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? htmlentities($_POST['passwordbaru']) : "";
$repasswordbaru = (isset($_POST['repasswordbaru'])) ? htmlentities($_POST['repasswordbaru']) : "";

if (!empty($_POST['ubah_password_validate'])) {
    $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$_SESSION[cuanki_viral]' && password = '$passwordlama'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if($passwordbaru == $repasswordbaru){
            $query = mysqli_query($koneksi, "UPDATE tb_user SET password='$passwordbaru' WHERE username = '$_SESSION[cuanki_viral]'");
            if ($query) {
                $message = '<script>alert("Password berhasil diubah");
                            window.history.back()</script>
                            </script>';
                
            } else {
                $message = '<script>alert("Password Gagal Diubah");
                            window.history.back()</script>
                            </script>';
            }
        }else{
            $message = '<script>alert("Password baru tidak sama");
                            window.history.back()</script>
                            </script>';
        }
       
    } else { 
        $message = '<script>alert("Password lama tidak sesuai");
                            window.history.back()</script>
                            </script>';
    }
}else{
        header('location:../home');
    }
echo $message;
?>
