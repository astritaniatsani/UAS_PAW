<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
<?php
include '../../koneksi.php';
 
$result=mysqli_query($koneksi,"SELECT * FROM mahasiswa where nim ='$_POST[kode]'");
$found=mysqli_num_rows($result);
 
if($found>0){ 
    $row=mysqli_fetch_array($result);{
	echo $row['nama'];
	}
 }else{
    echo "";
 }
 
$result=mysqli_query($koneksi,"SELECT * FROM dosen where nip ='$_POST[kode2]'");
$found=mysqli_num_rows($result);
 
if($found>0){
    $row=mysqli_fetch_array($result);
	{
	echo $row['nm_dosen'];
	 
	}
 }else{
    echo "";
 } 
 
 $result=mysqli_query($koneksi,"SELECT * FROM mahasiswa where nim ='$_POST[kode1]'");
$found=mysqli_num_rows($result);
 
if($found>0){
    $row=mysqli_fetch_array($result);
	{
	echo $row['jurusan'];
	 
	}
 }else{
    echo "";
 }
 

?>