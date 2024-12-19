<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Mobil</title>
  <link rel="stylesheet" href="<?= base_url('listKendaraan.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
  <?= $this->include('admin/navbar') ?>
  
  <main>
    <section id="pilih-kendaraan">
        <div class="link">
            <a href="<?= base_url('admin/home') ?>">Home</a> >> <a href = "<?= base_url('admin/listMobil') ?>">Mobil</a>
        </div>
    </section>
    <h1>Mobil</h1>
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search" onkeyup="searchCars()">
      </div>
      
      <div class="car-container" id="carContainer">
      <?php foreach($kendaraan as $mobil): ?>
        <a href="<?= base_url('admin/deskripsi/'.$mobil['id_kendaraan']) ?>" class="car-card" data-name="<?= strtolower($mobil['merk']) ?>">
            <img src="<?= base_url($mobil['image']) ?>" alt="<?= $mobil['merk'] ?>">
            <div class="car-info">
                <h2><?= $mobil['merk'] ?></h2>
                <p>Rp. <?= number_format($mobil['harga_sewa_perhari'], 0, ',', '.') ?> /hari</p>
                <span class="status <?= ($mobil['status'] == 'available') ? 'available' : 'unavailable' ?>">
                    <?= ucfirst($mobil['status']) ?>
                </span>
            </div>
        </a>
        <?php endforeach; ?>
      </div>
  </main>

  <script>
    function searchCars(){
      var input = document.getElementById('searchInput').value.toLowerCase();
      var carCards = document.getElementsByClassName('car-card');

      for (var i = 0; i < carCards.length; i++) {
        var carCard = carCards[i];
        var carName = carCard.getAttribute('data-name').toLowerCase();
        if (carName.indexOf(input) > -1) {
          carCard.style.display = '';
        } else {
          carCard.style.display = 'none';
        }
      }
    }
  </script>
</body>
</html>