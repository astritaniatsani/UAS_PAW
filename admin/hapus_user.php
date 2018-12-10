<html>
<head>
<title>Menghapus Data</title>
</head>
<body>
<?php
include '../koneksi.php';
$id = $_GET['id']; 
$query=mysqli_query($koneksi,"delete from admin where id='$id'") or die("Gagal menghapus data.");
mysqli_close($koneksi);
 
if($query){
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data Berhasil Dihapus!!!
								</div><script language="javascript">document.location.href="data_user.php";</script><?php
	}else{ 
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h3>Data  Gagal Dihapus !!!
								</div><script language="javascript">document.location.href="data_user.php";</script>
	<?php
	}
	?>
</body>
</html>