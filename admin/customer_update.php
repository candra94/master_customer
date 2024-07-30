<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama_customer  = $_POST['nama_customer'];
$email  = $_POST['email'];
$contact_pic1  = $_POST['contact_pic1'];
$contact_pic2  = $_POST['contact_pic2'];
$alamat  = $_POST['alamat'];
$keterangan  = $_POST['keterangan'];

mysqli_query($koneksi, "update customer set nama_customer='$nama_customer',
email='$email',contact_pic1='$contact_pic1',contact_pic2='$contact_pic2', 
alamat='$alamat', keterangan='$keterangan' where customer_id='$id'");
header("location:customer.php");