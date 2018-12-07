<?php
session_start();
if ($_SESSION['username'] = $username)
{
$koneksi=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("sutuga",$koneksi);
$query=mysql_query("select * from admin where username='$username'",$koneksi);
$row=mysql_fetch_array($query);
}
else
header("location:bukan_member.php");
?>
<?php
$sql = "Delete from rincian_surat where no_surat ='$_GET[no_surat]'";
$proses = mysql_query($sql);

$sql = "Delete from surat_tugas where no_surat ='$_GET[no_surat]'";
$proses = mysql_query($sql);

	if ($proses) {
		echo "<script>alert('Penghapusan data Pemesanan berhasil !')</script>";
		include "data_sutuga.php";
	} else { 
		echo "<script>alert('Penghapusan data Pemesanan tidak berhasil !')</script>";
		include "data_sutuga.php";
	}
?>
