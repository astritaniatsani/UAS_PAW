<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login
	?>
<?php
if(isset($_POST['tambahbtn'])){
	
		$sql = mysqli_query($koneksi,"INSERT INTO rincian_surat_kkp(no_surat_kkp,nim,nm_mhs,semester,jurusan) VALUES ('$_POST[nosurattxt]','$_POST[nimtxt]','$_POST[mhstxt]','$_POST[semestertxt]','$_POST[jurusantxt]')");
		include "pemesanan.php";
	
}else {
			
			$tglawal = substr($_POST['tglawal'],6,4)."-".substr($_POST['tglawal'],3,2)."-". substr($_POST['tglawal'],0,2);
			$tglakhir = substr($_POST['tglakhir'],6,4)."-".substr($_POST['tglakhir'],3,2)."-". substr($_POST['tglakhir'],0,2);
			
			$sql1 = mysqli_query($koneksi,"INSERT INTO surat_kerja_praktik(no_surat_kkp,tgl_awal_skkp,tgl_slsai_skkp,pejabat,nip,kepada) VALUES ('$_POST[nosurattxt]','$tglawal','$tglakhir','$_POST[pejabattxt]','$_POST[niptxt]','$_POST[kepadatxt]')");
			 if ($sql1) {
				echo "<script>alert('Penyimpanan data Surat berhasil !')</script>";
				include "input_skkp.php";
			} 
		else { 
				echo "<script>alert('Penyimpanan data Surat tidak berhasil !')</script>";
				include "pemesanan.php";
			}
	}


?>