<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$status = $_POST['status'];
$petugas = $_POST['matkul'];
$kategori = $_POST['nim'];

$query = mysqli_query($connection, "insert into post(id, judul, isi, status, petugas_id, kategori_id) VALUES($id, '$judul', '$isi', '$status', $petugas, $kategori)");

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

