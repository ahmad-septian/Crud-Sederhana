<?php
include 'koneksi.php';
$nama = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO tbl_mahasiswa (name,email,password) VALUES ('$nama','$email','" . md5($password) . "')";
mysqli_query($con, $query);
session_start();
$_SESSION['success'] = 'Data berhasil ditambahkan';
header("location:index.php");
