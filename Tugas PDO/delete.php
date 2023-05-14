<?php
//Faiz Nur Budi
//21081010113 
include('conn.php');

$status = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['employeeNumber'])) {
    $employeeNumber_upd = $_GET['employeeNumber'];
    $query = $conn->prepare("DELETE FROM employees WHERE employeeNumber = :employeeNumber ");

    $query->bindParam(':employeeNumber', $employeeNumber_upd);

    if ($query->execute()) {
      $status = 'ok1';
    } else {
      $status = 'err1';
    }

    header('Location: index.php?status=' . $status . '#employee');
  }
  if (isset($_GET['productLine'])) {
    $productLine_upd = $_GET['productLine'];
    $query = $conn->prepare("DELETE FROM productlines WHERE productLine = :productLine ");

    $query->bindParam(':productLine', $productLine_upd);

    if ($query->execute()) {
      $status = 'ok2';
    } else {
      $status = 'err2';
    }

    header('Location: index.php?status=' . $status  . '#productlines');
  }
}

?>