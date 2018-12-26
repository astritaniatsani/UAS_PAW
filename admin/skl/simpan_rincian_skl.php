<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login
		$tgllahir = substr($_POST['tgllahir'],6,4)."-".substr($_POST['tgllahir'],3,2)."-". substr($_POST['tgllahir'],0,2);
			$tglskl = substr($_POST['tglskl'],6,4)."-".substr($_POST['tglskl'],3,2)."-". substr($_POST['tglskl'],0,2);
		
			$sql1 = mysqli_query($koneksi,"INSERT INTO surat_lulus(no_surat_lulus,nm_dosen,nm_mhs,tgl_lulus,nip,pangkat,jurusan,jabatan,nim,ipk,tgl_lahir,tmpt_lhr,akademik) VALUES ('$_POST[nosurattxt]','$_POST[pejabattxt]','$_POST[mhstxt]','$tglskl','$_POST[niptxt]','$_POST[pangkattxt]','$_POST[jurusantxt]','$_POST[jabatantxt]','$_POST[nimtxt]','$_POST[ipktxt]','$tgllahir','$_POST[tmp_lahirtxt]','$_POST[akademiktxt]')");

		
			if ($sql1) {
				echo "<script>alert('Penyimpanan data Surat berhasil !')</script>";
				include "input_skl.php";
			} else { 
				echo "<script>alert('Penyimpanan data Surat tidak berhasil !')</script>";
				include "input_skl.php";
				}
			


?>