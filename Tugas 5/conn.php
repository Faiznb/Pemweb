<?php 
function connection()
{
   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "classicmodels";
   $conn = mysqli_connect($dbServer, $dbUser, $dbPass,$dbName);
   if(! $conn) {
	die('Koneksi gagal');
   }
   return $conn;
}

?>