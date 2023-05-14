<?php
//Faiz Nur Budi
//21081010113 
include('conn.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['employeeNumber'])) {

    $employeeNumber_upd = $_GET['employeeNumber'];
    $query = $conn->prepare("SELECT * FROM employees WHERE employeeNumber = :employeeNumber");

    $query->bindParam(':employeeNumber',$employeeNumber_upd);
    $query->execute();
  }
  if (isset($_GET['productLine'])) {

    $productLine_upd = $_GET['productLine'];
    $query = $conn->prepare("SELECT * FROM productlines WHERE productLine = :productLine");

    $query->bindParam(':productLine',$productLine_upd);
    $query->execute();
  }
}

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
  
      $query = $conn->prepare("UPDATE employees SET lastName=:lastName, firstName=:firstName, extension=:extension, email=:email, officeCode=:officeCode, reportsTo=:reportsTo, jobTitle=:jobTitle WHERE employeeNumber=:employeeNumber");

      $query->bindParam(':employeeNumber',$employeeNumber);
      $query->bindParam(':lastName',$lastName);
      $query->bindParam(':firstName',$firstName);
      $query->bindParam(':extension',$extension);
      $query->bindParam(':email',$email);
      $query->bindParam(':officeCode',$officeCode);
      $query->bindParam(':reportsTo',$reportsTo);
      $query->bindParam(':jobTitle',$jobTitle);

      $result = $query->execute();
      if ($result) {
        $status = 'ok1';
      } else {
        $status = 'err1';
      }
      header('Location: index.php?status=' . $status);
}
if (isset($_POST['productlines'])) {
    $productLine = $_POST['productLine'];
    $textDescription = $_POST['textDescription'];
    $htmlDescription = $_POST['htmlDescription'];
    $image = $_POST['image'];

    $query = $conn->prepare("UPDATE productlines SET textDescription=:textDescription, htmlDescription=:htmlDescription, image=:image WHERE productLine=:productLine");

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
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if (isset($_GET['employeeNumber'])) { ?>
    <form action="update.php" method="POST">
        <h2>Update Data Employee</h2>
        <?php while ($data = $query->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="form-group">
            <label>Employee Number</label>
            <input type="number" name="employeeNumber"  value="<?php echo $data['employeeNumber']; ?>"
                required="required" readonly>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" value="<?php echo $data['lastName']; ?>" required="required"
                autocomplete="off">
        </div>
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" value="<?php echo $data['firstName']; ?>"
                required="required" autocomplete="off">
            </select>
        </div>
        <div class="form-group">
            <label>Extension</label>
            <input type="text" name="extension" value="<?php echo $data['extension']; ?>"
                required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $data['email']; ?>" required="required"
                autocomplete="off">
        </div>
            <label>Office Code</label>
            <select name="officeCode">
                <?php echo "<option value=" . $data['officeCode'] . ">" . $data['officeCode'] . "</option>"; ?>
                <?php
                $query1 = "SELECT officeCode FROM offices";
                $result1 = $conn->query($query1);
                $data1 = '';
                ?>
                <?php while ($data1 = $result1->fetch(PDO::FETCH_ASSOC)) { ?>
                <?php echo "<option value=" . $data1['officeCode'] . ">" . $data1['officeCode'] . "</option>"; ?>
                <?php } ?>
            </select>
        </div>
        </div>
            <label>Reports to</label>
            <select name="reportsTo">
                <?php echo "<option value=" . $data['reportsTo'] . ">" . $data['reportsTo'] . "</option>"; ?>
                <?php
                $query2 = "SELECT employeeNumber FROM employees";
                $result2 = $conn->query($query2);
                $data2 = '';
                ?>
                <?php while ($data2 = $result2->fetch(PDO::FETCH_ASSOC)){ ?>
                <?php echo "<option value=" . $data2['employeeNumber'] . ">" . $data2['employeeNumber'] . "</option>"; ?>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>job title</label>
            <input type="text" name="jobTitle" value="<?php echo $data['jobTitle']; ?>" autocomplete="off">
        </div>
        <?php } ?>
        <button type="submit" name="employee">Simpan</button>
    </form>
    <?php } ?>
    <?php if (isset($_GET['productLine'])) { ?>
    <form action="update.php" method="POST">
        <h2>Update Data productlines</h2>
        <?php while ($data = $query->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="form-group">
            <label>Product Line</label>
            <input type="text" name="productLine"  value="<?php echo $data['productLine']; ?>"
                required="required" readonly>
        </div>
        <div class="form-group">
            <label>Text Description</label>
            <input type="text" name="textDescription"  value="<?php echo $data['textDescription']; ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Html Description</label>
            <input type="text" name="htmlDescription"  autocomplete="off" value="<?php echo $data['htmlDescription']; ?>">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="text" name="image" autocomplete="off" value="<?php echo $data['image']; ?>">
        </div>
        <?php } ?>
        <button type="submit" name="productlines">Simpan</button>
    </form>
    <?php } ?>
</body>

</html>