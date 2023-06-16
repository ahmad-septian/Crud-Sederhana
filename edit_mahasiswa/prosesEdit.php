<?php
include '../koneksi.php';
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

#CEK PASSWORD
$cekpassword = "SELECT * FROM tbl_mahasiswa WHERE password='$password'";
$result = mysqli_query($con, $cekpassword) or die(mysqli_error($con));
$rows = mysqli_num_rows($result);
if ($rows == 1) {
    $query = "UPDATE tbl_mahasiswa SET name = '$name',email = '$email' WHERE id = '$id' ";
} else {
    $query = "UPDATE tbl_mahasiswa SET name = '$name',email = '$email',password = '" . md5($password) . "' WHERE id = '$id' ";
}

mysqli_query($con, $query);
session_start();
$_SESSION['success'] = 'Data berhasil ubah';
header("location:../index.php");
