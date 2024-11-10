<?php 
// Mulai session
session_start();

// Cek parameter 'x' dan tentukan page yang akan di-include
if (isset($_GET['x']) && $_GET['x'] == 'home') {
  $page = "home.php";
  include "main.php";
} else if (isset($_GET['x']) && $_GET['x'] == 'order') {
  $page = "order.php";
  include "main.php";
} else if (isset($_GET['x']) && $_GET['x'] == 'riwayat') {
  $page = "riwayat.php";
  include "main.php";
} else if (isset($_GET['x']) && $_GET['x'] == 'user') {
  // Cek apakah level user 3 
  if (isset($_SESSION['level_cuanki']) && $_SESSION['level_cuanki'] == 3) {
    $page = "user.php";
    include "main.php";
  } else {
    $page = "home.php";
    include "main.php";
  }
} else if (isset($_GET['x']) && $_GET['x'] == 'report') {
  // Hanya pengguna dengan level 3 yang bisa akses report
  if (isset($_SESSION['level_cuanki']) && $_SESSION['level_cuanki'] == 3) {
    $page = "report.php";
    include "main.php";
  } else {
    $page = "home.php";
    include "main.php";
  }
} else if (isset($_GET['x']) && $_GET['x'] == 'menu') {
  $page = "menu.php";
  include "main.php";
} else if (isset($_GET['x']) && $_GET['x'] == 'login') {
  include "login.php";
} else if (isset($_GET['x']) && $_GET['x'] == 'logout') {
  include "proses/proses_logout.php";
} else if (isset($_GET['x']) && $_GET['x'] == 'daftar') {
  include "register.php";
}else {
  // Jika tidak ada parameter 'x', atau halaman tidak dikenali, default ke home
  $page = "home.php";
  include "main.php";
}
?>
