<html>
<head>
<title>Menghapus Data</title>
</head>
<body>
<?php
include "koneksi.php";
$nip = $_GET['nip']; 
$query=mysql_query("delete from dosen where nip='$nip'") or die("Gagal menghapus data.");
mysql_close($koneksi);
 
if($query){
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data Berhasil Dihapus!!!
								</div><script language="javascript">document.location.href="data_dosen.php";</script><?php
	}else{ 
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data  Gagal Dihapus !!!
								</div><script language="javascript">document.location.href="data_dosen.php";</script>
	<?php
	}
	?>
</body>
</html>