<html>
<head>
<title>Menghapus Data</title>
</head>
<body>
<?php
include "koneksi.php";
$kd_matkul = $_GET['kd_matkul']; 
$query=mysql_query("delete from matkul where kd_matkul='$kd_matkul'") or die("Gagal menghapus data.");
mysql_close($koneksi);
 
if($query){
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data Berhasil Dihapus!!!
								</div><script language="javascript">document.location.href="data_matkul.php";</script><?php
	}else{ 
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data  Gagal Dihapus !!!
								</div><script language="javascript">document.location.href="data_matkul.php";</script>
	<?php
	}
	?>
</body>
</html>