<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Restoran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="Assets/css/home.css" rel="stylesheet"> <!-- Tambahkan link CSS eksternal di sini -->
</head>

<style>
  .nav-pills {
    --bs-nav-pills-link-active-bg: #FE0303;
  }
</style>

<body>
  <div class="col-lg-9 mt-2">
    <div class="card">
      <div class="card-body">

        <!-- Carousel Foto Menu -->
        <div id="menuCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Assets/img/poster/1.jpg" class="d-block w-100" alt="Menu 1">
              <div class="carousel-caption d-none d-md-block">
                <p>Foto bersama keluarga besar Cuanki Cep Bewok.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="Assets/img/poster/2.jpg" class="d-block w-100" alt="Menu 2">
            </div>
            <div class="carousel-item">
              <img src="Assets/img/poster/3.jpg" class="d-block w-100" alt="Menu 3">
            </div>
            <div class="carousel-item">
              <img src="Assets/img/poster/4.jpg" class="d-block w-100" alt="Menu 4">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#menuCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#menuCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <!-- Deskripsi Restoran dengan Tampilan Bingkai -->
        <div class="about-section">
          <h5 class="card-title about-title">Tentang Kami</h5>
          <p class="card-text">Restoran kami menyediakan berbagai macam hidangan lezat yang terbuat dari bahan-bahan berkualitas tinggi. Kami berkomitmen untuk memberikan pengalaman kuliner yang terbaik bagi setiap pelanggan kami.</p>
        </div>
        <br>

        <!-- Row untuk Visi dan Misi -->
        <div class="row">
          <!-- Card Visi -->
          <div class="col-md-6">
            <div class="vision-card">
              <h5 class="vision-title">Visi Kami</h5>
              <p class="card-text">Menjadi restoran pilihan utama yang memberikan pengalaman kuliner yang tak terlupakan dengan rasa dan layanan yang luar biasa.</p>
            </div>
          </div>

          <!-- Card Misi -->
          <div class="col-md-6">
            <div class="mission-card">
              <h5 class="mission-title">Misi Kami</h5>
              <ul class="card-text">
                <li>Menyajikan makanan yang lezat dan berkualitas.</li>
                <li>Memberikan pelayanan terbaik kepada pelanggan.</li>
                <li>Menciptakan suasana yang nyaman dan menyenangkan bagi setiap tamu.</li>
                <li>Menggunakan bahan-bahan segar dan berkualitas tinggi.</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Lokasi Restoran -->
        <h5 class="card-title mt-5">Lokasi Kami</h5>
        <div class="card mb-4">
          <div class="card-body">
            <p>Jl. Kalpataru, Kota Malang</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7767.715171627762!2d112.59819162139114!3d-7.921527721124185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1731179290816!5m2!1sid!2sid" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>

        <!-- Kontak -->
        <h5 class="card-title mt-4">Kontak Kami</h5>
        <div class="card mb-4">
          <div class="card-body">
            <p>Email: cuanki.cepbewok@gmail.com</p>
            <p>Telp: +62 8954-1464-1972</p>
            <p>Instagram: @cuanki_cepbewok</p>
          </div>
        </div>

        <!-- Diskon atau Event -->
        <h5 class="card-title mt-4">Diskon & Event Terbaru</h5>
        <div class="event-carousel" style="overflow-x: auto; padding-bottom: 10px;">
          <div class="row" style="display: flex; flex-wrap: nowrap;">
            <!-- Diskon 1 -->
            <div class="col-lg-4 col-md-6 mb-4" style="flex-shrink: 0; display: inline-block;">
              <div class="card" style="overflow: hidden; height: 100%; box-sizing: border-box;">
                <img src="Assets/img/diskon.jpg" alt="disc1" class="card-img-top">
                <div class="card-body" style="overflow: hidden; padding: 15px; height: 100%; box-sizing: border-box;">
                  <h5 class="card-title">Diskon 20% untuk Menu Spesial</h5>
                  <p class="card-text">Nikmati diskon 20% untuk menu spesial kami setiap akhir pekan!</p>
                </div>
              </div>
            </div>
            <!-- Diskon 2 -->
            <div class="col-lg-4 col-md-6 mb-4" style="flex-shrink: 0; display: inline-block;">
              <div class="card" style="overflow: hidden; height: 100%; box-sizing: border-box;">
                <img src="Assets/img/chefday.jpg" class="card-img-top" alt="Diskon 2">
                <div class="card-body" style="overflow: hidden; padding: 15px; height: 100%; box-sizing: border-box;">
                  <h5 class="card-title">Event Makan Bersama Chef</h5>
                  <p class="card-text">Ikuti event makan bersama chef kami untuk pengalaman kuliner yang unik!</p>
                </div>
              </div>
            </div>
            <!-- Diskon 3 -->
            <div class="col-lg-4 col-md-6 mb-4" style="flex-shrink: 0; display: inline-block;">
              <div class="card" style="overflow: hidden; height: 100%; box-sizing: border-box;">
                <img src="Assets/img/promo11_11.jpg" class="card-img-top" alt="Event">
                <div class="card-body" style="overflow: hidden; padding: 15px; height: 100%; box-sizing: border-box;">
                  <h5 class="card-title">Promo Happy Hour</h5>
                  <p class="card-text">Dapatkan potongan harga khusus selama jam makan siang setiap hari kerja!</p>
                </div>
              </div>
            </div>
            <!-- Diskon 4 (Card Baru) -->
            <div class="col-lg-4 col-md-6 mb-4" style="flex-shrink: 0; display: inline-block;">
              <div class="card" style="overflow: hidden; height: 100%; box-sizing: border-box;">
                <img src="Assets/img/diskonn15persen.webp" class="card-img-top" alt="Diskon 4">
                <div class="card-body" style="overflow: hidden; padding: 15px; height: 100%; box-sizing: border-box;">
                  <h5 class="card-title">Diskon 15% untuk Menu Makanan Baru</h5>
                  <p class="card-text">Dapatkan diskon 15% untuk semua menu makanan baru kami selama bulan ini!</p>
                </div>
              </div>
            </div>
            <!-- Diskon 5 -->
            <div class="col-lg-4 col-md-6 mb-4" style="flex-shrink: 0; display: inline-block;">
              <div class="card" style="overflow: hidden; height: 100%; box-sizing: border-box;">
                <img src="Assets/img/10persen.png" class="card-img-top" alt="Diskon 5">
                <div class="card-body" style="overflow: hidden; padding: 15px; height: 100%; box-sizing: border-box;">
                  <h5 class="card-title">Diskon 10% untuk Menu Sarapan</h5>
                  <p class="card-text">Nikmati diskon 10% setiap pembelian menu sarapan sebelum pukul 10 pagi!</p>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- Tombol ke halaman lain -->
        <div class="d-flex mb-4">
          <a href="menu" class="btn btn-success mt-3 w-100">Lihat Menu Lengkap</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>