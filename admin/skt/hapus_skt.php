<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login
$sql = "Delete from surat_tahfidz where no_surat_tahfidz ='$_GET[no_surat]'";
$proses = mysqli_query($koneksi,$sql);


	if ($proses) {
		echo "<script>alert('Penghapusan data Surat Tahfidz berhasil !')</script>";
		include "data_skt.php";
	} else { 
		echo "<script>alert('Penghapusan data Surat Tahfidz TIDAK berhasil !')</script>";
		include "data_skt.php";
	}
?>
