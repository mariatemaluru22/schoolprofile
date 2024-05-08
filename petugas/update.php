<?php
session_start();
require_once '../helper/connection.php';

$nidn = $_POST['nidn'];
$user = $_POST['nama'];
$pass = $_POST['password'];

$query = mysqli_query($connection, "UPDATE petugas SET username = '$user', password = '$pass' WHERE id = '$nidn'");
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
