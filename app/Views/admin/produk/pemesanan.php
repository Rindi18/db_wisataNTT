<?=$this->extend('layout/template')?>

<?= $this->Section('content') ?>
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<<section id="welcome">
        <div class="welcome-content">
            <h1>Pemesanan Wisata NTT</h1>
            <p>Selamat datang di halaman pemesanan. Temukan berbagai pilihan tiket wisata, pesan secara online, dan nikmati pengalaman tak terlupakan di tempat wisata pilihan Anda.</p>
        </div>
    </section>
    <script>
        function toggleMenu() {
          const navUl = document.querySelector("nav ul");
          navUl.classList.toggle("active"); // Tambahkan atau hapus class 'active' untuk menggeser menu
        }
      </script>


<?= $this->endSection(); ?>