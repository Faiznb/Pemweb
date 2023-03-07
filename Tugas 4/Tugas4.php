<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
        margin: 0;
        }
        .container {
            width: 100%;
            font-family: "Times New Roman", Times, serif;
            background-color: whitesmoke;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1{
            margin: 0;
            padding:20px;
        }
        table, th, td{
            border: 1px solid black;
            text-align: center;
            border-collapse: collapse;
            font-size: 20px;
        }
        th{
            background-color: yellow;
        }
    </style>
</head>
<body>
<?php 

function connection() {
   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "classicmodels";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

   if(! $conn) {
	die('Koneksi gagal: ' . mysqli_error());
   }
   mysqli_select_db($conn,$dbName);
   return $conn;
} ?>
<div class="container">
<h1>Tabel Employee : </h1>
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
    </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM employees";
        $result = mysqli_query(connection(),$query);
        ?>
        <?php while($data = mysqli_fetch_array($result)): ?>
            <tr>
            <td><?php echo $data['employeeNumber'];  ?></td>
            <td><?php echo $data['lastName'];  ?></td>
            <td><?php echo $data['firstName'];  ?></td>
            <td><?php echo $data['extension'];  ?></td>
            <td><?php echo $data['email'];  ?></td>
            <td><?php echo $data['officeCode'];  ?></td>
            <td><?php echo $data['reportsTo'];  ?></td>
            <td><?php echo $data['jobTitle'];  ?></td>
            </tr>
        <?php endwhile ?>
        </tbody>
</table>

<h1>Tabel productlines : </h1>
<table>
    <thead>
    <tr>
        <th>Product Line</th>
        <th>Text Description</th>
        <th>Html Description</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM productlines";
        $result = mysqli_query(connection(),$query);
        ?>
        <?php while($data = mysqli_fetch_array($result)): ?>
            <tr>
            <td><?php echo $data['productLine'];  ?></td>
            <td><?php echo $data['textDescription'];  ?></td>
            <td><?php echo $data['htmlDescription'];  ?></td>
            <td><?php echo $data['image'];  ?></td>
            </tr>
        <?php endwhile ?>
        </tbody>
</table>
</div>
</body>
</html>