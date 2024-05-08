<?php
session_start();
require_once '../helper/connection.php';
$id = $_POST['id'];
$post = $_POST['galery'];
$isi = $_POST['judul'];
$rand = rand();
$filename = $_FILES['fileToUpload']['name'];
$ukuran = $_FILES['fileToUpload']['size'];
$xx = $filename.'_'.$rand;
$file_tmp =$_FILES['fileToUpload']['tmp_name']; 
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "upload/$filename");
$query = mysqli_query($connection, "insert into foto(id, galery_id, judul, file) VALUES($id, $post, '$isi', 'upload/$filename');");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  // header('Location: ./index.php');
header("location:index.php?alert1=$ukuran");

} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
header("location:index.php?alert2=$query");
  
}

