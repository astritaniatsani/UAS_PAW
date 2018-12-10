<html>
<head>
<title>Menghapus Data</title>
</head>
<body>
<?php
include '../koneksi.php';
$kd_ruang = $_GET['kd_ruang']; 
$query=mysqli_query($koneksi,"delete from ruang where kd_ruang='$kd_ruang'") or die("Gagal menghapus data.");
mysqli_close($koneksi);
 
if($query){
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data Berhasil Dihapus!!!
								</div><script language="javascript">document.location.href="data_ruang.php";</script><?php
	}else{ 
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data  Gagal Dihapus !!!
								</div><script language="javascript">document.location.href="data_ruang.php";</script>
	<?php
	}
	?>
</body>
</html>