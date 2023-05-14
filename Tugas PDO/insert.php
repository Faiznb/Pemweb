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
      $status = 'insc-ok';
    } else {
      $status = 'insc-err';
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
</body>

</html>