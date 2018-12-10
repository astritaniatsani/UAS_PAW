<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login
	}
?>
<?php
$sql = "Delete from rincian_surat where no_surat ='$_GET[no_surat]'";
$proses = mysqli_query($koneksi,$sql);

$sql = "Delete from surat_tugas where no_surat ='$_GET[no_surat]'";
$proses = mysqli_query($koneksi,$sql);

	if ($proses) {
		echo "<script>alert('Penghapusan data Surat Tugas berhasil !')</script>";
		include "data_sutuga.php";
	} else { 
		echo "<script>alert('Penghapusan data Surat Tugas TIDAK berhasil !')</script>";
		include "data_sutuga.php";
	}
?>
