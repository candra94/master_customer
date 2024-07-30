<?php 
include '../koneksi.php';
$nama_customer  = $_POST['nama_customer'];
$email  = $_POST['email'];
$email  = $_POST['nama_pic1'];
$contact_pic1  = $_POST['contact_pic1'];
$email  = $_POST['nama_pic2'];
$contact_pic2  = $_POST['contact_pic2'];
$alamat  = $_POST['alamat'];
$keterangan  = $_POST['keterangan'];
$user_entry  = $_POST['user_entry'];
$time_entry  = $_POST['time_entry'];


mysqli_query($koneksi, "insert into customer values (NULL,'$nama_customer','$email','$contact_pic1','$contact_pic2','$alamat','$keterangan')");
header("location:customer.php");