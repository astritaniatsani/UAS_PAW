<?php
session_start();
include 'koneksi.php';
if ($_SESSION['username'] = $username)
{
echo "<br>";
	$query_sutuga=mysqli_query($koneksi,"select status from admin where username='$username'");
	$row=mysqli_fetch_array($query_sutuga);
if ($row["status"]=="1") 
include("admin.php");
else 
include("dosen.php");
echo "<br>";
}
else
header("location:bukan_member.php");
?>

