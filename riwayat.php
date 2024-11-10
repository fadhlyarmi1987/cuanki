<?php
session_start();

// Cek apakah pengguna sudah login dan mendapatkan level pengguna dari sesi
$is_logged_in = isset($_SESSION['cuanki_viral']);
$user_level = $is_logged_in ? $_SESSION['level_cuanki'] : 0;

include 'koneksi.php';
?>

<div class="col-lg-9 mt-2">

    <div class="card">
        <div class="card-header">
            Riwayat Pesanan Selesai
            <form method="POST" action="" class="d-flex mb-4">
                <div class="input-group">
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="Masukkan nama pelanggan..." value="<?php echo isset($_POST['nama_pelanggan']) ? $_POST['nama_pelanggan'] : ''; ?>">
                    <button type="submit" name="search" class="btn btn-primary">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php
            // Cek apakah ada pencarian nama pelanggan
            if (isset($_POST['search']) && !empty($_POST['nama_pelanggan'])) {
                $nama_pelanggan = $_POST['nama_pelanggan'];
                $query = "SELECT * FROM orders WHERE status = 'Selesai' AND pelanggan LIKE '%$nama_pelanggan%' ORDER BY DATE(waktu_order) DESC, waktu_order DESC";
            } else {
                // Jika pencarian kosong, tampilkan semua data
                $query = "SELECT * FROM orders WHERE status = 'Selesai' ORDER BY DATE(waktu_order) DESC, waktu_order DESC";
            }

            $result = mysqli_query($koneksi, $query);

            // Cek apakah ada pesanan
            if (mysqli_num_rows($result) > 0) {
                $previous_date = '';  // Variabel untuk menyimpan tanggal sebelumnya

                // Loop melalui data pesanan
                while ($row = mysqli_fetch_assoc($result)) {
                    $order_date = date('Y-m-d', strtotime($row['waktu_order']));  // Ambil tanggal pesanan

                    // Jika tanggal pesanan berbeda dari tanggal sebelumnya, tampilkan header tanggal baru
                    if ($order_date != $previous_date) {
                        if ($previous_date != '') {
                            echo '</tbody></table>';  // Tutup tabel sebelumnya
                        }
                        echo '<h3>' . date('d F Y', strtotime($order_date)) . '</h3>';  // Tampilkan tanggal
                        echo '<table class="table table-striped">';
                        echo '<thead><tr><th>#</th><th>Kode Pesanan</th><th>Pelanggan</th><th>Meja</th><th>Status</th><th>Waktu Pesan</th><th>Detail</th>';
                    }

                    $id_order = $row['id_order'];
                    echo '<tr>';
                    echo '<td>' . $row['id_order'] . '</td>';
                    echo '<td>' . $row['kode_order'] . '</td>';
                    echo '<td>' . $row['pelanggan'] . '</td>';
                    echo '<td>' . $row['meja'] . '</td>';
                    echo '<td>' . $row['status'] . '</td>';
                    echo '<td>' . $row['waktu_order'] . '</td>';

                    // Menampilkan detail pesanan
                    $detailQuery = "SELECT * FROM order_details WHERE id_order = '$id_order'";
                    $detailResult = mysqli_query($koneksi, $detailQuery);
                    $detailData = [];
                    while ($detailRow = mysqli_fetch_assoc($detailResult)) {
                        $detailData[] = $detailRow;
                    }

                    // Tampilkan detail pesanan
                    echo '<td>';
                    if (count($detailData) > 0) {
                        echo '<button class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#detail_' . $id_order . '" aria-expanded="false" aria-controls="detail_' . $id_order . '">Lihat Detail</button>';
                        echo '<div class="collapse" id="detail_' . $id_order . '">';
                        echo '<table class="table mt-3">';
                        echo '<thead><tr><th>Nama Menu</th><th>Harga</th><th>Jumlah</th><th>Catatan</th></tr></thead>';
                        echo '<tbody>';
                        foreach ($detailData as $detail) {
                            echo '<tr>';
                            echo '<td>' . $detail['nama_menu'] . '</td>';
                            echo '<td>' . $detail['harga'] . '</td>';
                            echo '<td>' . $detail['jumlah'] . '</td>';
                            echo '<td>' . $detail['catatan'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                        echo '</div>';
                    } else {
                        echo 'Tidak ada detail pesanan.';
                    }
                    echo '</td>';

                    // Tampilkan tombol "Selesai" jika level >= 2 dan status masih "Menunggu"
                    if ($user_level >= 2 && $row['status'] == 'Menunggu') {
                        echo '<td>';
                        echo '<form method="POST" action="proses/update_status.php">';
                        echo '<input type="hidden" name="id_order" value="' . $id_order . '">';
                        echo '<button type="submit" class="btn btn-success">Selesai</button>';
                        echo '</form>';
                        echo '</td>';
                    }

                    echo '</tr>';

                    $previous_date = $order_date;  // Set tanggal pesanan saat ini sebagai tanggal sebelumnya
                }

                echo '</tbody></table>';
            } else {
                echo '<p>Tidak ada pesanan saat ini.</p>';
            }
            ?>

        </div>
    </div>
</div>
