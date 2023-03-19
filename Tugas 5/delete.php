<?php
//Faiz Nur Budi
//21081010113 
include('conn.php');

$status = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['customerNumber'])) {
    $customerNumber_upd = $_GET['customerNumber'];
    $query = "DELETE FROM customers WHERE customerNumber = '$customerNumber_upd'";

    $result = mysqli_query(connection(), $query);

    if ($result) {
      $status = 'ok1';
    } else {
      $status = 'err1';
    }

    header('Location: index.php?status=' . $status);
  }
  if (isset($_GET['productCode'])) {
    $productCode_upd = $_GET['productCode'];
    $query = "DELETE FROM products WHERE productCode = '$productCode_upd'";

    $result = mysqli_query(connection(), $query);

    if ($result) {
      $status = 'ok2';
    } else {
      $status = 'err2';
    }

    header('Location: index.php?status=' . $status);
  }
}

?>