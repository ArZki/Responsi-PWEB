<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Showdata.css">
  <title>Show data</title>
</head>

<body>
  <section class="hero">
    <div class="container">
      <?php
      $filename = '../Pinjam/daftarPinjam.txt';

      $file = fopen($filename, "r");

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
  </section>
</body>

</html>