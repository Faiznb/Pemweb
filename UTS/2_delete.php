<?php
//Faiz Nur Budi
//21081010113 
include('conn.php');

$status = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['id_bus'])) {
    $id_bus_upd = $_GET['id_bus'];
    $query = "DELETE FROM bus WHERE id_bus = '$id_bus_upd'";

    $result = mysqli_query(connection(), $query);

    if ($result) {
      $status = 'ok1';
    } else {
      $status = 'err1';
    }

    header('Location: index.php?status=' . $status);
  }
  if (isset($_GET['id_driver'])) {
    $id_driver_upd = $_GET['id_driver'];
    $query = "DELETE FROM driver WHERE id_driver = '$id_driver_upd'";

    $result = mysqli_query(connection(), $query);

    if ($result) {
      $status = 'ok2';
    } else {
      $status = 'err2';
    }

    header('Location: index.php?status=' . $status . '#driver');
  }
  if (isset($_GET['id_kondektur'])) {
    $id_kondektur_upd = $_GET['id_kondektur'];
    $query = "DELETE FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

    $result = mysqli_query(connection(), $query);

    if ($result) {
      $status = 'ok3';
    } else {
      $status = 'err3';
    }

    header('Location: index.php?status=' . $status . '#kondektur');
  }

  if (isset($_GET['id_trans_upn'])) {
    $id_trans_upn_upd = $_GET['id_trans_upn'];
    $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";

    $result = mysqli_query(connection(), $query);

    if ($result) {
      $status = 'ok4';
    } else {
      $status = 'err4';
    }

    header('Location: index.php?status=' . $status . '#trans_upn');
  }
}

?>