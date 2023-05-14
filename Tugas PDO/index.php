<?php
//Faiz Nur Budi
//21081010113 
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 5</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <a href="#employee" class="nav">Tabel Employee</a>
        <a href="#productlines" class="nav">Tabel Productlines</a>
    </nav>
    <div class="container">
        <div class="header" id="employee">
            <div class="text">Tabel Employee :</div>
            <?php
              if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok1') {
                echo '<div class="sukses">Data Employee berhasil di-update</div>';
              }
              elseif($status=='err1'){
                echo '<div class="danger">Data Employee gagal di-update</div>';
              }
              elseif($status=='insc-ok'){
                echo '<div class="sukses">Data Employee berhasil di-tambahkan</div>';
              }
              elseif($status=='insc-err'){
                echo '<div class="danger">Data Employee gagal di-tambahkan</div>';
              }
            }
          
           ?>
            <a href="insert.php?employees=1" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Extension</th>
                    <th>email</th>
                    <th>office code</th>
                    <th>reports to</th>
                    <th>job title</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM employees";
                $result = $conn->query($query);
                ?>
                <?php while($data = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $data['employeeNumber'];  ?></td>
                    <td><?php echo $data['lastName'];  ?></td>
                    <td><?php echo $data['firstName'];  ?></td>
                    <td><?php echo $data['extension'];  ?></td>
                    <td><?php echo $data['email'];  ?></td>
                    <td><?php echo $data['officeCode'];  ?></td>
                    <td><?php echo $data['reportsTo'];  ?></td>
                    <td><?php echo $data['jobTitle'];  ?></td>
                    <td> <a href=<?php echo "update.php?employeeNumber=" . $data['employeeNumber']; ?>
                            class="update">UPDATE</a></td>
                    <td> <a href=<?php echo "delete.php?employeeNumber=" . $data['employeeNumber']; ?>
                            class="delete">DELETE</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>


        <div class="header" id="productlines">
            <div class="text">Tabel Productlines : </div>
            <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok2') {
                echo '<div class="sukses">Data Productlines berhasil di-update</div>';
              }
              elseif($status=='err2'){
                echo '<div class="danger">Data Productlines gagal di-update</div>';
              }
              elseif($status=='insp-ok'){
                echo '<div class="sukses">Data Productlines berhasil di-tambahkan</div>';
              }
              elseif($status=='insp-err'){
                echo '<div class="danger">Data Productlines gagal di-tambahkan</div>';
              }
            }
           ?>
            <a href="insert.php?productlines=1" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Product Line</th>
                    <th>Text Description</th>
                    <th>Html Description</th>
                    <th>Image</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM productlines";
                $result = $conn->query($query);
                ?>
                <?php while($data = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $data['productLine'];  ?></td>
                    <td><?php echo $data['textDescription'];  ?></td>
                    <td><?php echo $data['htmlDescription'];  ?></td>
                    <td><?php echo $data['image'];  ?></td>
                    <td> <a href=<?php echo "update.php?productLine=" . $data['productLine']; ?>
                            class="update">UPDATE</a></td>
                    <td> <a href=<?php echo "delete.php?productLine=" . $data['productLine']; ?>
                            class="delete">DELETE</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>

</html>