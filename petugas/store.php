<?php
session_start();
require_once '../helper/connection.php';

$nidn = $_POST['nidn'];
$nama_dosen = $_POST['nama'];
$pass = $_POST['password'];

$query = mysqli_query($connection, "insert into petugas(id, username, password) value('$nidn', '$nama_dosen', '$pass' )");
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
