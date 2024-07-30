<?php 
include '../koneksi.php';

$nama_customer  = $_POST['nama_customer'];
$marketing  = $_POST['marketing'];
$email  = $_POST['email'];
$nama_pic1  = $_POST['nama_pic1'];
$contact_pic1  = $_POST['contact_pic1'];
$nama_pic2  = $_POST['nama_pic2'];
$contact_pic2  = $_POST['contact_pic2'];
$tlp_kantor  = $_POST['tlp_kantor'];
$alamat  = $_POST['alamat'];
$keterangan  = $_POST['keterangan'];
$user_entry  = $_POST['user_entry'];
$time_entry  = $_POST['time_entry'];


$cekdata="SELECT * FROM customer where nama_customer='$nama_customer'";
$ada=mysqli_query($cekdata) or die(mysqli_error());
if(mysqli_num_rows($ada)>0)
{ 
  echo "<h3>Nama Customer telah Terdaftar! Silahkan diulangi.</h3>"; 
}
else
{
  mysqli_query($koneksi, "insert into customer values (NULL,'$nama_customer','$marketing','$email','$nama_pic1','$contact_pic1','$nama_pic2','$contact_pic2','$tlp_kantor','$alamat','$keterangan','$user_entry','$time_entry')")
  or die("Gagal menyimpan data karena :").mysql_error();;
  header("location:customer.php");
}


// mysqli_query($koneksi, "insert into customer values (NULL,'$nama_customer','$marketing','$email','$nama_pic1','$contact_pic1','$nama_pic2','$contact_pic2','$tlp_kantor','$alamat','$keterangan','$user_entry','$time_entry')");
// header("location:customer.php");