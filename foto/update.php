<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$galery_id = $_POST['galery_id'];
$file = $_POST['file'];
$judul = $_POST['judul'];

$query = mysqli_query($connection, "UPDATE post SET judul = '$judul',' file '= '$file', galery_id = '$galery_id' WHERE id = '$id'");
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
