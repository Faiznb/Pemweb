<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="Faiz_Nur_Budi_21081010113_Tugas3.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Biodata</title> 
  </head>
  <body>
  <!-- php -->
  <?php
  $nama = "Faiz Nur Budi";
  $npm = 21081010113;
  $univ = "UPN Veteran Jawa Timur";
  $header = "BIODATA DIRI";
  $jurusan = "Informatika" ;
  $alamat = "Griya Candramas Blok DA 23";
  $email = "faiznurbudi@gmail.com";
  $tanggal_lahir = date('Y-m-d', strtotime('2003-04-08'));;
  $tempat_lahir = "Sukoharjo";
  $hobi = "Main game, Badminton";
  $birthDate = new \DateTime($tanggal_lahir);
  $today = new \DateTime("today");
  $y = $today->diff($birthDate)->y;
  ?>
  <!-- HTML -->
    <div class="Biodata">
      <div class="garis-1"></div>
      <div class="kotak-kiri">
        <img src="foto/Fotobio.png" alt="FotoBio" />
        <p class="text"><?php echo "$nama"?></p>
        <p class="text"><?php echo "$npm"?></p>
        <p class="text"><?php echo "$univ"?></p>
      </div>
      <table class="tabel">
        <tr>
          <th class="tabel-header" colspan="2"><?php echo "$header"?></th>
        </tr>
        <tr class="kanan-1">
          <td class="text1"><?php echo "Nama"?></td>
          <td class="text2"><?php echo ": $nama"?></td>
        </tr>
        <tr class="kanan-2">
          <td class="text1"><?php echo "Jurusan"?></td>
          <td class="text2"><?php echo ": $jurusan"?></td>
        </tr>
        <tr class="kanan-3">
          <td class="text1"><?php echo "Alamat"?></td>
          <td class="text2"><?php echo ": $alamat"?></td>
        </tr>
        <tr class="kanan-4">
          <td class="text1"><?php echo "Email"?></td>
          <td class="text2"><?php echo ": "?> <a href="mailto:faiznurbudi@gmail.com"><?php echo "$email"?></a></td>
        </tr>
        <tr class="kanan-5">
          <td class="text1"><?php echo "Tanggal Lahir"?></td>
          <td class="text2"><?php echo ": $tanggal_lahir, ".$y . " tahun"?></td>
        </tr>
        <tr class="kanan-6">
          <td class="text1"><?php echo "Tempat Lahir"?></td>
          <td class="text2"><?php echo ": $tempat_lahir"?></td>
        </tr>
        <tr class="kanan-7">
          <td class="text1"><?php echo "Hobi"?></td>
          <td class="text2"><?php echo ": $hobi"?></td>
        </tr>
      </table>
      <div class="garis-2"></div>
    </div>
  </body>
</html>
