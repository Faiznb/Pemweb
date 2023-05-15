<?php
//Faiz Nur Budi
//21081010113 
include "conn.php";

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['employee'])) {
    $employeeNumber = $_POST['employeeNumber'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $extension = $_POST['extension'];
    $email = $_POST['email'];
    $officeCode = $_POST['officeCode'];
    $reportsTo = $_POST['reportsTo'];
    $jobTitle = $_POST['jobTitle'];

    $query =  $conn->prepare("INSERT INTO employees (employeeNumber, lastName, firstName, extension, email, officeCode, reportsTo, jobTitle) VALUES(:employeeNumber, :lastName, :firstName, :extension, :email, :officeCode, :reportsTo, :jobTitle)");

    $query->bindParam(':employeeNumber',$employeeNumber);
    $query->bindParam(':lastName',$lastName);
    $query->bindParam(':firstName',$firstName);
    $query->bindParam(':extension',$extension);
    $query->bindParam(':email',$email);
    $query->bindParam(':officeCode',$officeCode);
    $query->bindParam(':reportsTo',$reportsTo);
    $query->bindParam(':jobTitle',$jobTitle);

    if ($query->execute()) {
      $status = 'inse-ok';
    } else {
      $status = 'inse-err';
    }
    header('Location: index.php?status=' . $status);
  }
  if (isset($_POST['productlines'])) {
    $productLine = $_POST['productLine'];
    $textDescription = $_POST['textDescription'];
    $htmlDescription = $_POST['htmlDescription'];
    $image = $_POST['image'];

    $query =  $conn->prepare("INSERT INTO productlines (productLine, textDescription, htmlDescription, image ) VALUES(:productLine, :textDescription, :htmlDescription, :image) ");

    $query->bindParam(':productLine',$productLine);
    $query->bindParam(':textDescription',$textDescription);
    $query->bindParam(':htmlDescription',$htmlDescription);
    $query->bindParam(':image',$image);

    if ($query->execute()) {
      $status = 'insp-ok';
    } else {
      $status = 'insp-err';
    }
    header('Location: index.php?status=' . $status . '#productlines');
  }
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

    $query = $conn->prepare("INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES(:customerNumber,:customerName,:contactLastName,:contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)");
    
    $query->bindParam(':customerNumber',$customerNumber);
    $query->bindParam(':customerName',$customerName);
    $query->bindParam(':contactLastName',$contactLastName);
    $query->bindParam(':contactFirstName',$contactFirstName);
    $query->bindParam(':phone',$phone);
    $query->bindParam(':addressLine1',$addressLine1);
    $query->bindParam(':addressLine2',$addressLine2);
    $query->bindParam(':city',$city);
    $query->bindParam(':state',$state);
    $query->bindParam(':postalCode',$postalCode);
    $query->bindParam(':country',$country);
    $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
    $query->bindParam(':creditLimit',$creditLimit);

    if ($query->execute()) {
      $status = 'insc-ok';
    } else {
      $status = 'insc-err';
    }
    header('Location: index.php?status=' . $status . '#customers');
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

    $query = $conn->prepare("INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) VALUES(:productCode,:productName,:productLine,:productScale, :productVendor, :productDescription, :quantityInStock, :buyPrice, :MSRP)");

    $query->bindParam(':productCode',$productCode);
    $query->bindParam(':productName',$productName);
    $query->bindParam(':productLine',$productLine);
    $query->bindParam(':productScale',$productScale);
    $query->bindParam(':productVendor',$productVendor);
    $query->bindParam(':productDescription',$productDescription);
    $query->bindParam(':quantityInStock',$quantityInStock);
    $query->bindParam(':buyPrice',$buyPrice);
    $query->bindParam(':MSRP',$MSRP);

    if ($query->execute()) {
      $status = 'inspr-ok';
    } else {
      $status = 'inspr-err';
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

    <?php if (isset($_GET['employees'])) { ?>
    <form action="insert.php" method="POST">
        <h2>Insert Data Employee</h2>
        <div class="form-group">
            <label>Employee Number</label>
            <input type="number" name="employeeNumber" required="required">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Extension</label>
            <input type="text" name="extension" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Office Code</label>
            <select name="officeCode">
                <option value=''>Select</option>
                <?php
                $query1 = "SELECT officeCode FROM offices";
                $result1 = $conn->query($query1);
                ?>
                <?php while ($data1 = $result1->fetch(PDO::FETCH_ASSOC)): ?>
                <?php echo "<option value=" . $data1['officeCode'] . ">" . $data1['officeCode'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>Reports to</label>
            <select name="reportsTo">
                <option value=''>Select</option>
                <?php
                $query2 = "SELECT employeeNumber FROM employees";
                $result2 = $conn->query($query2);
                ?>
                <?php while ($data2 = $result2->fetch(PDO::FETCH_ASSOC)): ?>
                <?php echo "<option value=" . $data2['employeeNumber'] . ">" . $data2['employeeNumber'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>job title</label>
            <input type="text" name="jobTitle" required="required" autocomplete="off">
        </div>
        <button type="submit" name="employee">Simpan</button>
    </form>
    <?php } ?>

    <?php if (isset($_GET['productlines'])) { ?>
    <form action="insert.php" method="POST">
        <h2>Insert Data productlines</h2>
        <div class="form-group">
            <label>Product Line</label>
            <input type="text" name="productLine" required="required">
        </div>
        <div class="form-group">
            <label>Text Description</label>
            <input type="text" name="textDescription"  autocomplete="off" value=" ">
        </div>
        <div class="form-group">
            <label>Html Description</label>
            <input type="text" name="htmlDescription"  autocomplete="off" value=" ">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="text" name="image" autocomplete="off" value=" ">
        </div>
        <button type="submit" name="productlines">Simpan</button>
    </form>
    <?php } ?>

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
                $query1 = "SELECT employeeNumber FROM employees";
                $result1 = $conn->query($query1);
                ?>
                <?php while ($data1 = $result1->fetch(PDO::FETCH_ASSOC)): ?>
                <?php echo "<option value=" . $data1['employeeNumber'] . ">" . $data1['employeeNumber'] . "</option>"; ?>
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
                $query1 = "SELECT productLine FROM productlines";
                $result1 = $conn->query($query1);
                ?>
                <?php while ($data1 = $result1->fetch(PDO::FETCH_ASSOC)): ?>
                <?php echo "<option value=" . "'" . $data1['productLine'] . "'" . ">" . $data1['productLine'] . "</option>"; ?>
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