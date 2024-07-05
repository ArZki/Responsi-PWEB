<?php



if (isset($_POST['Submit'])) {

  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $nomor = $_POST['nomor'];
  $judulBuku = $_POST['judulBuku'];
  $waktuStart = $_POST['waktuStart'];
  $waktuEnd = $_POST['waktuEnd'];


  function waktuPinjam($waktuStart, $waktuEnd)
  {
    $waktuStart = new DateTime($waktuStart);
    $waktuEnd = new DateTime($waktuEnd);

    $gap = $waktuStart->diff($waktuEnd);

    return $gap->days;
  }

  $hariPinjam = waktuPinjam($waktuStart, $waktuEnd);

  function totalPembayaran($hariPinjam)
  {
    $biayaPinjam = 0;
    $costDay = 5000;

    if ($hariPinjam == 1) {
      $biayaPinjam += $hariPinjam * $costDay;
    } else if ($hariPinjam <= 7) {
      $biayaPinjam += $hariPinjam * $costDay;
    } else if ($hariPinjam >= 7) {
      $biayaPinjam += ($hariPinjam * $costDay) + 10000;
    }

    return $biayaPinjam;
  }

  $totalBiaya = totalPembayaran($hariPinjam);

  /* Appened */
  $file = fopen("daftarPinjam.txt", "a") or die("File can't open");
  fwrite($file, "-----------------------\n");
  fwrite($file, "Nama \t\t\t\t\t: " . $nama . "\n");
  fwrite($file, "Email \t\t\t\t: " . $email . "\n");
  fwrite($file, "Nomor \t\t\t\t: " . $nomor . "\n");
  fwrite($file, "Judul Buku \t\t: " . $judulBuku . "\n");
  fwrite($file, "Waktu Awal \t\t: " . $waktuStart . "\n");
  fwrite($file, "Waktu Akhir \t: " . $waktuEnd . "\n");
  fwrite($file, "Hari Pinjam \t: " . $hariPinjam . "\n");
  fwrite($file, "Biaya \t\t\t\t: " . $totalBiaya . "\n");
  fwrite($file, "-----------------------\n");
  fclose($file);

  /* Write */
  $file = fopen("daftarPinjamW.txt", "w") or die("File can't open");
  fwrite($file, "Nama \t\t\t\t\t: " . $nama . "\n");
  fwrite($file, "Email \t\t\t\t: " . $email . "\n");
  fwrite($file, "Nomor \t\t\t\t: " . $nomor . "\n");
  fwrite($file, "Judul Buku \t\t: " . $judulBuku . "\n");
  fwrite($file, "Waktu Awal \t\t: " . $waktuStart . "\n");
  fwrite($file, "Waktu Akhir \t: " . $waktuEnd . "\n");
  fwrite($file, "Hari Pinjam \t: " . $hariPinjam . "\n");
  fwrite($file, "Biaya \t\t\t\t: " . $totalBiaya . "\n");
  fclose($file);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Pinjam_out.css">
  <title>Document</title>
</head>

<body>
  <section class="hero">
    <div class="container">
      <div class="title">
        <h4>Terimakasih telah meminjam</h4>
        <p>Have a nice day 😉✌️</p>
      </div>
      <div class="output-put">
        <div class="data">
          <a href="../ShowData/Showdata.php">Tampilkan data</a>
        </div>
        <div class="output">
          <?php
          $filename = 'daftarPinjamW.txt';
          $file = fopen($filename, 'r');
          if ($file) {
            $filesize = filesize($filename);
            $content = fread($file, $filesize);
            fclose($file);
            echo nl2br($content);
          } else {
            echo "Can't open file";
             
          }
          ?>
        </div>
      </div>
    </div>
  </section>
</body>

</html>