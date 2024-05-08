<?php
session_start();
require_once '../helper/connection.php';

$nidn = $_POST['nidn'];
$kategori_name = $_POST['kategori'];

$query = mysqli_query($connection, "UPDATE kategori SET kategori_name = '$kategori_name' WHERE id = '$nidn'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
