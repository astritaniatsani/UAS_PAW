<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
<?php
include "koneksi.php";

$result=mysql_query("SELECT * FROM matkul where kd_matkul ='$_POST[kode]'");
$found=mysql_num_rows($result);
 
if($found>0){
    $row=mysql_fetch_array($result);{
	echo $row['nm_matkul'];
	}
 }else{
    echo "";
 }
 
$result=mysql_query("SELECT * FROM matkul where kd_matkul ='$_POST[kode1]'");
$found=mysql_num_rows($result);
 
if($found>0){
    $row=mysql_fetch_array($result);
	{
	echo $sks= $row['jml_sks_T']+$row['jml_sks_P']+$row['jml_sks_PL'];
	 
	}
 }else{
    echo "";
 } 
 
 $result=mysql_query("SELECT * FROM matkul where kd_matkul ='$_POST[kode2]'");
$found=mysql_num_rows($result);
 
if($found>0){
    $row=mysql_fetch_array($result);
	{
	if($row['semester']%2==0){
		echo "Semester Genap";
	}
	else{
	 	echo "Semester Ganjil";
	}
	}
 }else{
    echo "";
 }
 

?>