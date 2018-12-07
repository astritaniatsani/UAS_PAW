<html>
<head>
<title>Menghapus Data</title>
</head>
<body>
<?php
include "koneksi.php";
$kd_ruang = $_GET['kd_ruang']; 
$query=mysql_query("delete from ruang where kd_ruang='$kd_ruang'") or die("Gagal menghapus data.");
mysql_close($koneksi);
 
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