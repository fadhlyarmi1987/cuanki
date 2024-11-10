<?php
include "proses/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM tb_daftar_menu
  LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id_kat_menu = tb_daftar_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
$select_kat_menu = mysqli_query($koneksi, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>


<div class="col-lg-9 mt-2">
  <div>
    <div class="card-body">
      <div class="row">
        <?php if ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3): ?>
          <div class="col d-flex justify-content-end">
            <button class="btn link-light" data-bs-toggle="modal" data-bs-target="#ModalTambahUser" style="background-color: green; cursor: pointer;" onmouseover="this.style.backgroundColor='#15610B'" onmouseout="this.style.backgroundColor='green'">Tambah Menu</button>
          </div>
        <?php endif; ?>




        <!-- Modal Tambah Menu baru -->
        <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="input-group mb-3">
                        <input type="file" class="form-control py-3" id="uploadfoto" placeholder="foto" name="foto"
                          required>
                        <label class="input-group-text" for="uploadfoto">Upload Foto Menu</label>
                        <div class="invalid-feedback">
                          Masukkan file foto menu
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="NamaMenu"
                          name="nama_menu" required>
                        <label for="floatingInput">Nama Menu</label>
                        <div class="invalid-feedback">
                          Masukkan Nama Menu
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan"
                          name="keterangan" required>
                        <label for="floatingPassword">Keterangan</label>
                        <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <select class=" form-select mb-3" aria-label="Default select example" name="kategori" required>
                          <option selected hidden value="">Pilih Kategori Menu</option>
                          <?php
                          foreach ($select_kat_menu as $value) {
                            echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                          }
                          ?>
                        </select>
                        <label for="floatingInput">Kategori Makanan Atau Minuman</label>
                        <div class="invalid-feedback">
                          Pilih Menu Makanan Atau Minuman
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                        <label for="floatingInput">Harga</label>
                        <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" required>
                        <label for="floatingInput">Stok</label>
                        <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                        </div>
                      </div>
                    </div>
                  </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save
                  changes</button>
              </div>
              </form>
            </div>

          </div>
        </div>
        <!-- akhir Modal Tambah Menu baru -->
        <?php
        foreach ($result as $row) {
        ?>
          <!-- awal modal view -->
          <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['nama_menu'] ?>">
                          <label for="floatingInput">Nama Menu</label>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['keterangan'] ?>">
                          <label for="floatingPassword">Keterangan</label>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <select disabled class=" form-select mb-3" aria-label="Default select example">
                            <?php
                            foreach ($select_kat_menu as $value) {
                              if ($row['kategori'] == $value['id_kat_menu']) {
                                echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                              } else {
                                echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                              }
                            }
                            ?>
                          </select>
                          <label for="floatingInput">Kategori Makanan Atau Minuman</label>
                          <div class="invalid-feedback">
                            Pilih Menu Makanan Atau Minuman
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga'] ?>">
                          <label for="floatingInput">Harga</label>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['stok'] ?>">
                          <label for="floatingInput">Stok</label>
                          <div class="invalid-feedback">
                            Tidak Boleh Kosong!
                          </div>
                        </div>
                      </div>
                    </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save
                    changes</button>
                </div>
                </form>
              </div>

            </div>
          </div>
          <!-- akhir modal view -->

          <!-- awal modal Edit -->
          <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_edit_menu.php" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="input-group mb-3">
                          <input type="file" class="form-control py-3" id="uploadfoto" placeholder="foto" name="foto">
                          <label class="input-group-text" for="uploadfoto">Upload Foto Menu</label>
                          <div class="invalid-feedback">
                            Masukkan file foto menu
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" placeholder="NamaMenu"
                            name="nama_menu" value="<?php echo $row['nama_menu'] ?>" required>
                          <label for="floatingInput">Nama Menu</label>
                          <div class="invalid-feedback">
                            Masukkan Nama Menu
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan"
                            name="keterangan" value="<?php echo $row['keterangan'] ?>" required>
                          <label for="floatingPassword">Keterangan</label>
                          <div class="invalid-feedback">
                            Tidak Boleh Kosong!
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <select class=" form-select mb-3" aria-label="Default select example" name="kategori">
                            <?php
                            foreach ($select_kat_menu as $value) {
                              if ($row['kategori'] == $value['id_kat_menu']) {
                                echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                              } else {
                                echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                              }
                            }
                            ?>
                          </select>
                          <label for="floatingInput">Kategori Makanan Atau Minuman</label>
                          <div class="invalid-feedback">
                            Pilih Menu Makanan Atau Minuman
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required value="<?php echo $row['harga'] ?>">
                          <label for="floatingInput">Harga</label>
                          <div class="invalid-feedback">
                            Tidak Boleh Kosong!
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" value="<?php echo $row['stok'] ?>" required>
                          <label for="floatingInput">Stok</label>
                          <div class="invalid-feedback">
                            Tidak Boleh Kosong!
                          </div>
                        </div>
                      </div>
                    </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save
                    changes</button>
                </div>
                </form>
              </div>

            </div>
          </div>
          <!-- akhir modal Edit -->

          <!-- awal modal Hapus -->
          <div class="modal fade" id="ModalHapus<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_delete_menu.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="col-lg-12">
                      Apakah anda ingin menghapus <b><?php echo $row['nama_menu'] ?></b>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">Hapus</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- akhir modal Hapus -->

          <!-- Modal Order -->
          <div class="modal fade" id="ModalOrder<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Order Menu</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="proses/proses_order.php" method="POST">
                    <input type="hidden" name="id_menu" value="<?php echo $row['id'] ?>">
                    <input type="hidden" name="nama_menu" value="<?php echo $row['nama_menu'] ?>"> <!-- Nama menu -->
                    <input type="hidden" name="harga" value="<?php echo $row['harga'] ?>"> <!-- Harga menu -->

                    <!-- Input untuk Nama Pelanggan -->
                    <div class="mb-3">
                      <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                      <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required placeholder="Masukkan Nama Pelanggan">
                    </div>

                    <div class="mb-3">
                      <label for="nama_pelanggan" class="form-label">Meja</label>
                      <input type="text" class="form-control" id="nomor_meja" name="nomor_meja" required placeholder="Masukkan Nomor Meja">
                    </div>

                    <div class="mb-3">
                      <label for="jumlah_order" class="form-label">Jumlah</label>
                      <input type="number" class="form-control" id="jumlah_order" name="jumlah_order" required min="1" max="<?php echo $row['stok'] ?>">
                      <div class="invalid-feedback">
                        Jumlah harus lebih dari 0!
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="catatan" class="form-label">Catatan (opsional)</label>
                      <textarea class="form-control" id="catatan" name="catatan"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Pesan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Akhir Modal Order -->



        <?php
        }
        if (empty($result)) {
          echo "Data User Tidak Ada";
        } else {
        ?>
          <div class="table-responsive">
            <table class="table table table-hover">
              <thead>
                <tr class="text-nowrap">
                  <th scope="col">No.</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nama Menu</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Jenis Menu</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Harga</th>
                  <th scope="col">aksi</th>
                  <?php if ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3) { ?>
                    <th scope="col">stok</th>
                    <th scope="col">aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($result as $row) {

                ?>

                  <tr>
                    <th scope="row">
                      <?php echo $no++ ?>
                    </th>
                    <td>
                      <div style="width: 80px">
                        <img src="Assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                      </div>
                    </td>
                    <td>
                      <?php echo $row['nama_menu'] ?>
                    </td>
                    <td>
                      <?php echo $row['keterangan'] ?>
                    </td>
                    <td>
                      <?php echo ($row['jenis_menu'] == 1) ? "Makanan" : "Minuman" ?>
                    </td>
                    <td>
                      <?php echo $row['kategori_menu'] ?>
                    </td>
                    <td>
                      <?php echo $row['harga'] ?>
                    </td>
                    <td>
                      <?php if ($hasil['level'] == 0) { ?>
                      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalOrder<?php echo $row['id'] ?>">Order</button>

                    </td>
                  <?php } elseif ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3) { ?>
                    <td>
                      <?php echo $row['stok']; ?>
                    </td>
                    <td>
                      <div class="d-flex ">
                        <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                          data-bs-target="#ModalView<?php echo $row['id']; ?>"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal"
                          data-bs-target="#ModalEdit<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger btn-sm me-2" data-bs-toggle="modal"
                          data-bs-target="#ModalHapus<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></button>
                      </div>
                    </td>
                  <?php } ?>

                  </td>
                  </tr>

                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php
        }
?>
</div>
</div>
</div>
</div>

<script>
  (() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission ss
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()

  function addToOrder(itemId, itemName) {
    // Redirect to the order page with the selected item's id
    window.location.href = "order.php?item_id=" + itemId + "&item_name=" + encodeURIComponent(itemName);
  }
</script>