<?php

  include 'config/database.php';

  $nama = $_GET['nama'] ?? '';
  $alamat = $_GET['alamat'] ?? '';

  $sql = "SELECT person.id, person.nama, person.alamat , GROUP_CONCAT(hobi.hobi SEPARATOR ', ') as hobi
          FROM person
          LEFT JOIN hobi ON hobi.person_id = person.id
          WHERE person.nama LIKE ? AND person.alamat LIKE ?
          GROUP BY person.id
  ";
  $stmt = $conn->prepare($sql);
  
  $searchNama = "%$nama%";
  $searchAlamat = "%$alamat%";

  $stmt->bind_param("ss", $searchNama, $searchAlamat);
  $stmt->execute();
  $result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal 3</title>
</head>
<body>
  <form method="get">
    <table>
      <tr>
          <td>
              <label for="nama">Nama</label>
          </td>
          <td>:</td>
          <td>
              <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($nama) ?>">
          </td>
      </tr>
      <tr>
          <td>
              <label for="alamat">Alamat</label>
          </td>
          <td>:</td>
          <td>
              <input type="text" name="alamat" id="alamat" value="<?= htmlspecialchars($alamat) ?>">
          </td>
      </tr>
      <tr>
          <td></td>
          <td></td>
          <td>
            <button type="submit">Search</button>
          </td>
      </tr>
    </table>
      
  </form>

  <br>

  <table border="1">
      <thead>
          <tr>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Hobi</th>
          </tr>
      </thead>
      <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                  <td><?= htmlspecialchars($row['nama']) ?></td>
                  <td><?= htmlspecialchars($row['alamat']) ?></td>
                  <td><?= htmlspecialchars($row['hobi'] ?? '') ?></td>
              </tr>
          <?php endwhile; ?>
      </tbody>
  </table>
</body>
</html>

<?php
  $stmt->close();
  $conn->close();
?>