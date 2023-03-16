<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = "DELETE FROM customers WHERE customerNumber = '$customerNumber_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok1';
          }
          else{
            $status = 'err1';
          }

          //redirect ke halaman lain
          header('Location: index.php?status='.$status);
      }
      if (isset($_GET['productCode'])) {
        //query SQL
        $productCode_upd = $_GET['productCode'];
        $query = "DELETE FROM products WHERE productCode = '$productCode_upd'"; 

        //eksekusi query
        $result = mysqli_query(connection(),$query);

        if ($result) {
          $status = 'ok2';
        }
        else{
          $status = 'err2';
        }

        //redirect ke halaman lain
        header('Location: index.php?status='.$status);
    }   
  }

  ?>