<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = "DELETE FROM tbl_mahasiswa WHERE id='$id'";

mysqli_query($con, $query);
session_start();
$_SESSION['delete'] = 'Data berhasil dihapus';
header("location:index.php");
