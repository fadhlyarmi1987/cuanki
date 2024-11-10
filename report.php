<?php
// Cek apakah pengguna sudah login dan mendapatkan level pengguna dari sesi
$is_logged_in = isset($_SESSION['cuanki_viral']);
$user_level = $is_logged_in ? $_SESSION['level_cuanki'] : 0;

include 'koneksi.php';
?>

<div class="col-lg-9 mt-2">

  <div class="card">
    
    <div class="card-body">
      <?php
      // Ambil data pesanan yang statusnya 'Selesai' dan kelompokkan berdasarkan tanggal
      $query = "
        SELECT DATE(o.waktu_order) AS order_date, 
               od.nama_menu, 
               SUM(od.jumlah) AS total_terjual, 
               SUM(od.harga * od.jumlah) AS total_penjualan
        FROM order_details od
        JOIN orders o ON od.id_order = o.id_order
        WHERE o.status = 'Selesai'
        GROUP BY order_date, od.nama_menu
        ORDER BY order_date DESC, total_terjual DESC
      ";

      if (isset($_POST['search'])) {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $query = "
          SELECT DATE(o.waktu_order) AS order_date, 
                 od.nama_menu, 
                 SUM(od.jumlah) AS total_terjual, 
                 SUM(od.harga * od.jumlah) AS total_penjualan
          FROM order_details od
          JOIN orders o ON od.id_order = o.id_order
          WHERE o.status = 'Selesai' AND o.pelanggan LIKE '%$nama_pelanggan%'
          GROUP BY order_date, od.nama_menu
          ORDER BY order_date DESC, total_terjual DESC
        ";
      }

      $result = mysqli_query($koneksi, $query);

      // Cek apakah ada data
      if (mysqli_num_rows($result) > 0) {
        $previous_date = '';  // Variabel untuk menyimpan tanggal sebelumnya
        echo '<table class="table table-striped">';
        echo '<tbody>';

        // Loop untuk menampilkan hasil query
        while ($row = mysqli_fetch_assoc($result)) {
          $order_date = $row['order_date'];  // Ambil tanggal pesanan

          // Jika tanggal pesanan berbeda dari tanggal sebelumnya, tampilkan header tanggal baru
          if ($order_date != $previous_date) {
            if ($previous_date != '') {
              echo '</tbody></table>';  // Tutup tabel sebelumnya
            }
            echo '<h3>' . date('d F Y', strtotime($order_date)) . '</h3>';  // Tampilkan tanggal
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>Nama Menu</th><th>Total Jumlah Terjual</th><th>Total Penjualan (Harga)</th></tr></thead>';
          }

          echo '<tr>';
          echo '<td>' . $row['nama_menu'] . '</td>';
          echo '<td>' . $row['total_terjual'] . '</td>';
          echo '<td>' . number_format($row['total_penjualan'], 2) . '</td>';  // Format harga dengan dua desimal
          echo '</tr>';

          $previous_date = $order_date;  // Set tanggal pesanan saat ini sebagai tanggal sebelumnya
        }

        echo '</tbody></table>';
      } else {
        echo '<p>Tidak ada data penjualan.</p>';
      }
      ?>

    </div>
  </div>
</div>