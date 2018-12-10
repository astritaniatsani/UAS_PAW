<html>
<head>
<title>Menghapus Data</title>
</head>
<body>
<?php
include '../koneksi.php';
$kd_jur = $_GET['kd_jur']; 
$query=mysqli_query($koneksi,"delete from jurusan where kd_jur='$kd_jur'") or die("Gagal menghapus data.");
mysqli_close($koneksi);
 
if($query){
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data Berhasil Dihapus!!!
								</div><script language="javascript">document.location.href="data_jurusan.php";</script><?php
	}else{ 
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data  Gagal Dihapus !!!
								</div><script language="javascript">document.location.href="data_jurusan.php";</script>
	<?php
	}
	?>
</body>
</html>