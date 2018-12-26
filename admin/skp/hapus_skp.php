<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login
$sql = "Delete from surat_penelitian where no_surat_kp ='$_GET[no_surat]'";
$proses = mysqli_query($koneksi,$sql);

	if ($proses) {
		echo "<script>alert('Penghapusan data Surat Kerja Praktik berhasil !')</script>";
		include "data_skp.php";
	} else { 
		echo "<script>alert('Penghapusan data Surat Kerja Praktik TIDAK berhasil !')</script>";
		include "data_skp.php";
	}
?>
