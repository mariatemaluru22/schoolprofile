<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$status = $_POST['status'];

$query = mysqli_query($connection, "UPDATE post SET judul = '$judul', isi = '$isi', status = '$status' WHERE id = '$id'");
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
