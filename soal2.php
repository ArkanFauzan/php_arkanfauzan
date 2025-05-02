<?php
  $nama = $_POST['nama'] ?? '';
  $umur = $_POST['umur'] ?? '';
  $hobi = $_POST['hobi'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal 2</title>

  <style>
    .inline-block {
      display: inline-block;
    }

    .w-100 {
      width: 100px;
    }
  </style>

</head>
<body>

  <?php
    $isDone = !empty($nama) && !empty($umur) && !empty($hobi);

    if ($isDone) {
      echo "
        <div>
          <p>Nama: $nama</p>
          <p>Umur: $umur</p>
          <p>Hobi: $hobi</p>
        </div>
      ";
    } 
    else {
      ?>
        <form action="" method="post">

          <div style='<?= empty($nama) ? "" : "display:none" ?>'>
            <p class="inline-block w-100">Nama Anda: </p>
            <input type="text" name="nama" value="<?= $nama ?>" class="inline-block" required>
          </div>

          <div style='<?= !empty($nama) && empty($umur) ? "" : "display:none" ?>'>
            <p class="inline-block w-100">Umur Anda: </p>
            <input type="number" name="umur" value="<?= $umur ?>" class="inline-block" <?= !empty($nama) && empty($umur) ? "required" : "" ?>>
          </div>

          <div style='<?= !empty($umur) && empty($hobi) ? "" : "display:none" ?>'>
            <p class="inline-block w-100">Hobi Anda: </p>
            <input type="text" name="hobi" value="<?= $hobi ?>" class="inline-block" <?= !empty($umur) && empty($hobi) ? "required" : "" ?>>
          </div>

          <div>
            <p class="inline-block w-100"></p>
            <button type="submit">Submit</button>
          </div>
          
        </form>
      <?php
    }
  ?>

</body>
</html>