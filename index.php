<?php
include 'koneksi.php';
// echo "<pre>";
// print_r($jadwalAktif);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>I-LAB</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="header-left">
      <img src="img/assets/neskar.png" alt="Logo 1" class="logo">
      <img src="img/assets/pplg.png" alt="Logo 2" class="logo">
      <h1 class="lab">LAB 1</h1>
    </div>
    <div class="header-right">
      <div class="tanggal" id="tanggal"></div>
      <div class="jam" id="clock"></div>
    </div>
  </header>

  <div class="container">
    <div class="kiri">
  <div class="guru-section">
    <?php if($jadwalAktif) { ?>
      <img src="<?= $jadwalAktif['foto']; ?>" alt="Guru" class="guru-img">
      <div class="mapel-info">
        <h2 id="mapel"><?= $jadwalAktif['mapel']; ?></h2>
        <p id="guru"><?= $jadwalAktif['nama']; ?></p>
      </div>
    <?php } else { ?>
      <img src="img/guru/penanggung.png" alt="Penanggungjawab" class="guru-img">
      <div class="mapel-info">
        <h2>PENANGGUNGJAWAB LAB</h2>
        <p>Yusuf Efendy, S.T</p>
      </div>
    <?php } ?>
  </div> <!-- ✅ ini baru nutup guru-section -->
  <?php if ($sedangIstirahat) { ?>
  <div class="video-overlay active">
    <video autoplay muted loop>
      <source src="video/istirahat2.mp4" type="video/mp4">
      Browser kamu tidak mendukung video.
    </video>
    <div class="info">
      <h2>Sedang Istirahat</h2>
      <div id="tanggal"></div>
      <div id="clock"></div>
    </div>
  </div>
<?php } ?>

</div> <!-- ✅ ini nutup kiri -->

    <div class="kanan">
      <div class="jadwal-grid">
        <!-- Hari Senin -->
        <div class="jadwal-item">
          <h3>Senin</h3>
          <ul>
            <li>Psikotes (07:15 - 07:50)</li>
            <li>Bahasa Inggris (07:50 - 08:45)</li>
            <li>PWB (09:00 - 10:30)</li>
          </ul>
        </div>

        <!-- Hari Selasa -->
            <div class="jadwal-item">
            <h3>Selasa</h3>
            <ul>
                <li>PBT (07:15 - 08:45)</li>
                <li>PAI (09:00 - 10:30)</li>
                <li>B. Indonesia (09:00 - 10:30)</li>
            </ul>
            </div>
            <div class="jadwal-item">
            <h3>Rabu</h3>
            <ul>
                <li>PKK (07:15 - 08:45)</li>
                <li>PPB (09:00 - 10:30)</li>
            </ul>
            </div>
            <div class="jadwal-item">
            <h3>Kamis</h3>
            <ul>
                <li>PSIKOTES (07:15 - 08:45)</li>
                <li>B. Inggris (09:00 - 10:30)</li>
                <li>PAI (10:45 - 12:15)</li>
                <li>PJOK (10:45 - 12:15)</li>
            </ul>
            </div>
            <div class="jadwal-item" id="jumat">
            <h3>Jumat</h3>
            <ul>
                <li>BSD (07:15 - 08:45)</li>
                <li>Matematika (09:00 - 10:30)</li>
            </ul>
            </div>
          
        </div>
      </div>
    </div>
</div>





    <footer>
    I-LAB Project by Adrian
    </footer>


  
  <script src="script.js"></script>
</body>
</html>
