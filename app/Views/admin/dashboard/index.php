<?=$this->extend('admin/layout/template')?>

<?= $this->Section('content') ?>
      

    <section id="welcome">
        <div class="welcome-content">
            <h1>Nusa Tenggara Timur</h1>
            <p>Kami senang menyambut Anda di website kami, tempat di mana Anda dapat menjelajahi keindahan dan kebudayaan Nusa Tenggara Timur. Selamat menikmati perjalanan Anda!</p>
        </div>
    </section>
    <script>
        function toggleMenu() {
          const navUl = document.querySelector("nav ul");
          navUl.classList.toggle("active"); // Tambahkan atau hapus class 'active' untuk menggeser menu
        }
      </script>

      <?= $this->endSection(); ?>
             
    