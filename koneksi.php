<?php
$host="localhost";
$user="root";
$password="";
$database="uploadface";
$koneksi=mysqli_connect($host,$user,$password);
mysqli_select_db($koneksi,$database);
//cek koneksi
if($koneksi){
	//echo "berhasil koneksi";
}else{
echo "gagal koneksi";
}
?>