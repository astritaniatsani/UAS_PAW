<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login

$sql = "Delete from rincian_surat_kkp where no_surat_kkp ='$_GET[no_surat]'";
$proses = mysqli_query($koneksi,$sql);

$sql = "Delete from surat_kerja_praktik where no_surat_kkp ='$_GET[no_surat]'";
$proses = mysqli_query($koneksi,$sql);

	if ($proses) {
		echo "<script>alert('Penghapusan data Surat Kerja Praktik berhasil !')</script>";
		include "data_skkp.php";
	} else { 
		echo "<script>alert('Penghapusan data Surat Kerja Praktik TIDAK berhasil !')</script>";
		include "data_skkp.php";
	}
?>
