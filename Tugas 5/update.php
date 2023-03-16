<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

      }
      if (isset($_GET['productCode'])) {
        //query SQL
        $productCode_upd = $_GET['productCode'];
        $query = "SELECT * FROM products WHERE productCode = '$productCode_upd'"; 

        //eksekusi query
        $result = mysqli_query(connection(),$query);
    }   
  }

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
      //query SQL
      $query = "UPDATE customers SET customerName = '$customerName', contactLastName = '$contactLastName', contactFirstName = '$contactFirstName', phone = '$phone', addressLine1 = '$addressLine1', addressLine2 = '$addressLine2', city = '$city', state = '$state', postalCode = '$postalCode', country = '$country', salesRepEmployeeNumber = '$salesRepEmployeeNumber', creditLimit = '$creditLimit' WHERE customerNumber = '$customerNumber'"; 
  
      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok1';
      }
      else{
        $status = 'err1';
      }
      header('Location: index.php?status='.$status);}
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
        //query SQL
        $query = "UPDATE products SET productName = '$productName', productLine = '$productLine', productScale = '$productScale', productVendor = '$productVendor', productDescription = '$productDescription', quantityInStock = '$quantityInStock', buyPrice = '$buyPrice', MSRP = '$MSRP' WHERE productCode = '$productCode'"; 
    
        //eksekusi query
        $result = mysqli_query(connection(),$query);
        if ($result) {
          $status = 'ok2';
        }
        else{
          $status = 'err2';
        }
        header('Location: index.php?status='.$status.'#products');}
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

<?php if (isset($_GET['customerNumber'])) { ?>
        <form action="update.php" method="POST">
        <h2 style="margin: 30px 0 30px 0;">Update Data Customer</h2>
        <?php while($data = mysqli_fetch_array($result)) { ?>
         <div class="form-group">
         <label>Customer Number</label>
         <input type="number" name="customerNumber" value="<?php echo $data['customerNumber']; ?>" required="required" readonly>
        </div>
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" name="customerName" value="<?php echo $data['customerName']; ?>"required="required" autocomplete="off"> 
            </div>
            <div class="form-group">
              <label>Contact Last Name</label>
              <input type="text" name="contactLastName" value="<?php echo $data['contactLastName']; ?>" required="required" autocomplete="off">
              </select>
            </div>
            <div class="form-group">
              <label>Contact First Name</label>
              <input type="text" name="contactFirstName" value="<?php echo $data['contactFirstName']; ?>" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" name="phone" value="<?php echo $data['phone']; ?>" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Adress Line 1</label>
              <input type="text" name="addressLine1" value="<?php echo $data['addressLine1']; ?>" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Adress Line 2</label>
              <input type="text" name="addressLine2" value="<?php echo $data['addressLine2']; ?>" autocomplete="off">
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" value="<?php echo $data['city']; ?>" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>State</label>
              <input type="text" name="state" value="<?php echo $data['state']; ?>" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Postal Code</label>
              <input type="text" name="postalCode" value="<?php echo $data['postalCode']; ?>" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Country</label>
              <input type="text" name="country" value="<?php echo $data['country']; ?>"required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Sales Rep Employee Number</label>
              <select name="salesRepEmployeeNumber">
                <?php echo "<option value=".$data['salesRepEmployeeNumber'].">".$data['salesRepEmployeeNumber']."</option>" ;?>
                <?php 
                $query_f = "SELECT employeeNumber FROM employees";
                $result_f = mysqli_query(connection(),$query_f);
                $data_f = '';
                ?>
                <?php while($data_f = mysqli_fetch_assoc($result_f)){ ?>
                  <?php echo "<option value=".$data_f['employeeNumber'] . ">".$data_f['employeeNumber']."</option>";?>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Credit Limit</label>
              <input type="number" name="creditLimit" value="<?php echo $data['creditLimit']; ?>" autocomplete="off">
            </div>
            <?php } ?>
            <button type="submit" name="customer">Simpan</button>
          </form>
          <?php } ?>

   <?php if (isset($_GET['productCode'])) { ?>
        <form action="update.php" method="POST">
        <h2 style="margin: 30px 0 30px 0;">Update Data Product</h2>
        <?php while($data = mysqli_fetch_array($result)) { ?>
         <div class="form-group">
         <label>Product Code</label>
         <input type="text" name="productCode" value="<?php echo $data['productCode']; ?>" required="required" readonly>
        </div>
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" name="productName" value="<?php echo $data['productName']; ?>" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Product Line</label>
              <select name="productLine">
              <?php echo "<option value=".$data['productLine'].">".$data['productLine']."</option>" ;?>
                <?php 
                $query_f = "SELECT productLine FROM productlines";
                $result_f = mysqli_query(connection(),$query_f);
                ?>
                <?php while($data_f = mysqli_fetch_assoc($result_f)){ ?>
                  <?php echo "<option value="."'".$data_f['productLine'] . "'".">".$data_f['productLine']."</option>";?>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Product Scale</label>
              <input type="text" name="productScale" value="<?php echo $data['productScale']; ?>" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Product Vendor</label>
              <input type="text" name="productVendor" value="<?php echo $data['productVendor']; ?>" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <input type="text" name="productDescription" value="<?php echo $data['productDescription']; ?>" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Quantity In Stock</label>
              <input type="number" name="quantityInStock" value="<?php echo $data['quantityInStock']; ?>" required="required">
            </div>
            <div class="form-group">
              <label>Buy Price</label>
              <input type="number" name="buyPrice" value="<?php echo $data['buyPrice']; ?>" required="required">
            </div>
            <div class="form-group">
              <label>MSRP</label>
              <input type="number" name="MSRP"  value="<?php echo $data['MSRP']; ?>" required="required">
            </div>
            <?php } ?>
            <button type="submit" name="product">Simpan</button>
          </form>
          <?php }?>
</body>
</html>
