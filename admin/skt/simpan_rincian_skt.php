<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login

			$tgltahfidz = substr($_POST['tglskt'],6,4)."-".substr($_POST['tglskt'],3,2)."-". substr($_POST['tglskt'],0,2);
			 
			$sql1 = mysqli_query($koneksi,"INSERT INTO surat_tahfidz(no_surat_tahfidz,tanggal,nip,pejabat,nim,nm_mhs,nilai,jurusan) VALUES ('$_POST[nosurattxt]','$tgltahfidz','$_POST[niptxt]','$_POST[pejabattxt]','$_POST[nimtxt]','$_POST[mhstxt]','$_POST[nilaitxt]','$_POST[jurusantxt]')");
			 if ($sql1) {
				echo "<script>alert('Penyimpanan data Surat Tahfidz berhasil !')</script>";
				include "input_skt.php";
			} 
		else { 
				echo "<script>alert('Penyimpanan data Surat Tahfidz tidak berhasil !')</script>";
				include "input_skt.php";
			}



?>