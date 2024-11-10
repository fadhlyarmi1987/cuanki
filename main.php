<?php
// Halaman yang bisa diakses tanpa login
$halaman_tanpa_login = ["home.php", "menu.php", "order.php"];

// Jika halaman yang diminta tidak termasuk dalam halaman tanpa login dan session kosong, redirect ke login
if (!in_array($page, $halaman_tanpa_login) && empty($_SESSION['cuanki_viral'])) {
  header('location:login');
  exit();
}

include "proses/koneksi.php";
// Cek jika sudah login, query data user
if (!empty($_SESSION['cuanki_viral'])) {
  $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$_SESSION[cuanki_viral]' ");
  $hasil = mysqli_fetch_array($query);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restoran Makanan Enak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <!-- Header -->
  <?php include "header.php"; ?>
  <!-- End Header -->

  <!-- Side Bar -->
  <?php include "sidebar.php"; ?>
  <!-- End Side Bar -->

  <!-- Content -->
  <?php
  include $page;
  ?>
  <!-- End Content -->
  </div>

  <!-- <footer class="fixed-bottom text-center bg-light py-2">@Copyright Cuanki 2024</footer> -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    window.addEventListener('scroll', function() {
      var navbar = document.querySelector('.navbar');
      var scrollTop = window.scrollY;

      // Hitung opacity berdasarkan posisi scroll
      var newOpacity = 1 - (scrollTop / 200);
      // Batasi rentang opacity antara 0 dan 1
      newOpacity = Math.min(1, Math.max(0.5, newOpacity));

      // Set opacity navbar
      navbar.style.backgroundColor = 'rgba(255, 0, 0, ' + newOpacity + ')';
    });
  </script>

</body>

</html>