<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$post = $_POST['post_id'];
$isi = $_POST['position'];
$status = $_POST['status'];


$query = mysqli_query($connection, "insert into galery(id, post_id, position, status) VALUES($id, $post, '$isi', '$status')");

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}

