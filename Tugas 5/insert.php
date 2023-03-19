<?php
//Faiz Nur Budi
//21081010113 
include "conn.php";

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['customer'])) {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];

    $query = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES('$customerNumber','$customerName','$contactLastName','$contactFirstName', '$phone', '$addressLine1' , '$addressLine2' , '$city' , '$state' , '$postalCode', '$country', '$salesRepEmployeeNumber' , '$creditLimit')";


    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'insc-ok';
    } else {
      $status = 'insc-err';
    }
    header('Location: index.php?status=' . $status);
  }
  if (isset($_POST['product'])) {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];

    $query = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) VALUES('$productCode','$productName','$productLine','$productScale', '$productVendor', '$productDescription' , '$quantityInStock' , '$buyPrice' , '$MSRP')";

    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'insp-ok';
    } else {
      $status = 'insp-err';
    }
    header('Location: index.php?status=' . $status . '#products');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php if (isset($_GET['customer'])) { ?>
    <form action="insert.php" method="POST">
        <h2>Insert Data Customer</h2>
        <div class="form-group">
            <label>Customer Number</label>
            <input type="number" name="customerNumber" required="required">
        </div>
        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="customerName" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Contact Last Name</label>
            <input type="text" name="contactLastName" required="required" autocomplete="off">
            </select>
        </div>
        <div class="form-group">
            <label>Contact First Name</label>
            <input type="text" name="contactFirstName" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Adress Line 1</label>
            <input type="text" name="addressLine1" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Adress Line 2</label>
            <input type="text" name="addressLine2" autocomplete="off">
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>State</label>
            <input type="text" name="state" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Postal Code</label>
            <input type="text" name="postalCode" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Country</label>
            <input type="text" name="country" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Sales Rep Employee Number</label>
            <select name="salesRepEmployeeNumber">
                <option value=''>Select</option>
                <?php
          $query = "SELECT employeeNumber FROM employees";
          $result = mysqli_query(connection(), $query);
          ?>
                <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <?php echo "<option value=" . $data['employeeNumber'] . ">" . $data['employeeNumber'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>Credit Limit</label>
            <input type="number" name="creditLimit">
        </div>
        <button type="submit" name="customer">Simpan</button>
    </form>
    <?php } ?>

    <?php if (isset($_GET['product'])) { ?>
    <form action="insert.php" method="POST">
        <h2>Insert Data Product</h2>
        <div class="form-group">
            <label>Product Code</label>
            <input type="text" name="productCode" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="productName" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Product Line</label>
            <select name="productLine">
                <option value=''>Select</option>
                <?php
          $query = "SELECT productLine FROM productlines";
          $result = mysqli_query(connection(), $query);
          ?>
                <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <?php echo "<option value=" . "'" . $data['productLine'] . "'" . ">" . $data['productLine'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>Product Scale</label>
            <input type="text" name="productScale" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Product Vendor</label>
            <input type="text" name="productVendor" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <input type="text" name="productDescription" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Quantity In Stock</label>
            <input type="number" name="quantityInStock" required="required">
        </div>
        <div class="form-group">
            <label>Buy Price</label>
            <input type="number" name="buyPrice" required="required">
        </div>
        <div class="form-group">
            <label>MSRP</label>
            <input type="number" name="MSRP" required="required">
        </div>
        <button type="submit" name="product">Simpan</button>
    </form>
    <?php } ?>
</body>

</html>