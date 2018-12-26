<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login
	
?>
<?php
$sql = "Delete from surat_lulus where no_surat_lulus ='$_GET[no_surat]'";
$proses = mysqli_query($koneksi,$sql);

	if ($proses) {
		echo "<script>alert('Penghapusan data Surat Lulus berhasil !')</script>";
		include "data_skl.php";
	} else { 
		echo "<script>alert('Penghapusan data Surat Lulus TIDAK berhasil !')</script>";
		include "data_skl.php";
	}
?>
