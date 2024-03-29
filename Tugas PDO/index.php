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
        <a href="#customers" class="nav">Tabel Customer</a>
        <a href="#products" class="nav">Tabel Product</a>
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
              elseif($status=='inse-ok'){
                echo '<div class="sukses">Data Employee berhasil di-tambahkan</div>';
              }
              elseif($status=='inse-err'){
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
        <div class="header" id="customers">
            <div class="text">Tabel Customer : </div>
            <?php
              if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok3') {
                echo '<div class="sukses">Data Customers berhasil di-update</div>';
              }
              elseif($status=='err3'){
                echo '<div class="danger">Data Customers gagal di-update</div>';
              }
              elseif($status=='insc-ok'){
                echo '<div class="sukses">Data Customers berhasil di-tambahkan</div>';
              }
              elseif($status=='insc-err'){
                echo '<div class="danger">Data Customers gagal di-tambahkan</div>';
              }
            }
          
           ?>
            <a href="insert.php?customer=1" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Customer Number</th>
                    <th>Customer Name</th>
                    <th>Contact Last Name</th>
                    <th>Contact First Name</th>
                    <th>Phone</th>
                    <th>Adress Line 1</th>
                    <th>Adress Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                    <th>Sales Rep Employee Number</th>
                    <th>Credit Limit</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM customers";
                $result = $conn->query($query);
                ?>
                <?php while($data = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $data['customerNumber'];  ?></td>
                    <td><?php echo $data['customerName'];  ?></td>
                    <td><?php echo $data['contactLastName'];  ?></td>
                    <td><?php echo $data['contactFirstName'];  ?></td>
                    <td><?php echo $data['phone'];  ?></td>
                    <td><?php echo $data['addressLine1'];  ?></td>
                    <td><?php echo $data['addressLine2'];  ?></td>
                    <td><?php echo $data['city'];  ?></td>
                    <td><?php echo $data['state'];  ?></td>
                    <td><?php echo $data['postalCode'];  ?></td>
                    <td><?php echo $data['country'];  ?></td>
                    <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
                    <td><?php echo $data['creditLimit'];  ?></td>
                    <td> <a href=<?php echo "update.php?customerNumber=" . $data['customerNumber']; ?>
                            class="update">UPDATE</a></td>
                    <td> <a href=<?php echo "delete.php?customerNumber=" . $data['customerNumber']; ?>
                            class="delete">DELETE</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>


        <div class="header" id="products">
            <div class="text">Tabel Product : </div>
            <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok4') {
                echo '<div class="sukses">Data Product berhasil di-update</div>';
              }
              elseif($status=='err4'){
                echo '<div class="danger">Data Product gagal di-update</div>';
              }
              elseif($status=='inspr-ok'){
                echo '<div class="sukses">Data Product berhasil di-tambahkan</div>';
              }
              elseif($status=='inspr-err'){
                echo '<div class="danger">Data Product gagal di-tambahkan</div>';
              }
            }
           ?>
            <a href="insert.php?product=1" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Line</th>
                    <th>Product Scale</th>
                    <th>Product Vendor</th>
                    <th>Product Description</th>
                    <th>Quantity In Stock</th>
                    <th>Buy Price</th>
                    <th>MSRP</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM products";
                $result = $conn->query($query);
                ?>
                <?php while($data = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $data['productCode'];  ?></td>
                    <td><?php echo $data['productName'];  ?></td>
                    <td><?php echo $data['productLine'];  ?></td>
                    <td><?php echo $data['productScale'];  ?></td>
                    <td><?php echo $data['productVendor'];  ?></td>
                    <td><?php echo $data['productDescription'];  ?></td>
                    <td><?php echo $data['quantityInStock'];  ?></td>
                    <td><?php echo $data['buyPrice'];  ?></td>
                    <td><?php echo $data['MSRP'];  ?></td>
                    <td> <a href=<?php echo "update.php?productCode=" . $data['productCode']; ?>
                            class="update">UPDATE</a></td>
                    <td> <a href=<?php echo "delete.php?productCode=" . $data['productCode']; ?>
                            class="delete">DELETE</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
  </div>
</body>

</html>