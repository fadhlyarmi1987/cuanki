<nav class="navbar navbar-expand sticky-top" style="background-color: #FF0000;">
  <div class="container-lg">
    <img src="Assets/logo_cuanki.png" alt="" style="width: 110px; height: auto;">

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php
        // Cek apakah pengguna sudah login
        if (!empty($_SESSION['cuanki_viral'])) {
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #FFFFFF; border-radius: 10px; box-shadow: 3px 3px 10px grey;">
              <?php
              // Menampilkan username yang login
              echo $hasil['username'];
              ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-2">
              <li><a class="dropdown-item" href="#"><i class="bi bi-incognito"></i> Profile</a></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Ubah Password</a></li>
              <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-right"></i> Log Out</a></li>
            </ul>
          </li>
        <?php
        } else {
        // Jika pengguna belum login, tampilkan dropdown login
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #FFFFFF; border-radius: 10px; box-shadow: 3px 3px 10px grey;">
              Login
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-2">
              <li><a class="dropdown-item" href="login"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
              <li><a class="dropdown-item" href="daftar"><i class="bi bi-pencil-square"></i> Daftar</a></li>
            </ul>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
