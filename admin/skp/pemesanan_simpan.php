<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login			
			$tglskp = substr($_POST['tglskp'],6,4)."-".substr($_POST['tglskp'],3,2)."-". substr($_POST['tglskp'],0,2);
			
			$sql1 = mysqli_query($koneksi,"INSERT INTO surat_penelitian(no_surat_kp,pejabat,tujuan,tgl_skp,nim,nm_mhs,nip,semester,akademik,judul,dospem1,dospem2) VALUES ('$_POST[nosurattxt]','$_POST[pejabattxt]','$_POST[tujuantxt]','$tglskp','$_POST[nimtxt]','$_POST[mhstxt]','$_POST[niptxt]','$_POST[semestertxt]','$_POST[akademiktxt]','$_POST[judultxt]','$_POST[dospem1txt]','$_POST[dospem2txt]')");
			 if ($sql1) {
				echo "<script>alert('Penyimpanan data Surat berhasil !')</script>";
				include "input_skp.php";
			} 
		else { 
				echo "<script>alert('Penyimpanan data Surat tidak berhasil !')</script>";
				include "pemesanan.php";
			}
