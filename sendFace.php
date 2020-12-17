<?php
error_reporting(0);
include "koneksi.php";
$username=$_POST['username'];
$password=$_POST['password'];
$image_name = "D:\\xampp\\htdocs\\uploadFace\\image\\".$username;
$image_name2 = "D:\\\\\\\\xampp\\\htdocs\\\uploadFace\\\image\\\\".$username;
$base64_string = $_POST['image'];
$query=mysqli_query($koneksi, "select * from user where username='$username' and pass='$password'");
$cek=mysqli_num_rows($query);
$date=getdate();
if(!$cek)
{
	echo "username/password tidak terdaftar, silahkan ";
	?><a href='form_admin.php'> coba lagi</a> <?php 
	exit(1);
} else
{
	$query=mysqli_query($koneksi, "update user set imagepath='$image_name2' where username='$username'");
}
$query=mysqli_query($koneksi, "insert into log (username) value ('$username')");
if (!file_exists($image_name)) {
 if (!mkdir($image_name, 0777, true)) {
    $m=array('msg' => "REJECTED, cant create folder");
    echo json_encode($m);
    return;}
}

$fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
$fileCount = iterator_count($fi)+1;
$data = explode(',', $base64_string);
$fullName = $image_name."\\X__".$fileCount."_". date("YmdHis") .".png";
$ifp = fopen($fullName, "wb");
fwrite($ifp, base64_decode($data[1]));
fclose($ifp);
if (!$ifp){
    $m=array('msg' => "REJECTED, ".$fullName."not saved");
    echo json_encode($m);
    return;}

// $command = escapeshellcmd("python checkFace.py ".$fullName);
// $output = shell_exec($command);

$fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
$fileCount = iterator_count($fi);
$m = array('msg' => "Berhasil Mengirim"." total(".$fileCount.")");
echo json_encode($m);


?>
