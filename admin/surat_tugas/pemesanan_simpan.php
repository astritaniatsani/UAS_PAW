<?php 
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login
	?>
<?php
if(isset($_POST['tambahbtn'])){
	if(!$_POST['kdmatkultxt']){
		echo "<script>alert('Data tidak boleh ada yang kosong !')</script>";
		echo "<meta http-equiv='refresh' content='pemesanan.php'>";	
	}else {
		$sql = mysqli_query($koneksi,"INSERT INTO rincian_surat(no_surat,kd_matkul,sks,kurikulum,hari,jam,ruang) VALUES ('$_POST[nosurattxt]','$_POST[kdmatkultxt]','$_POST[skstxt]','$_POST[kurikulumtxt]','$_POST[hari]','$_POST[jam]','$_POST[ruang]')");
		include "pemesanan.php";
	}
}else {
			$sql = "select * from rincian_surat where no_surat ='$_POST[nosurattxt]'";
		$proses = mysqli_query($koneksi,$sql);
		$record = mysqli_num_rows($proses);
		if ($record>=1){
			
			$tglawal = substr($_POST['tglawal'],6,4)."-".substr($_POST['tglawal'],3,2)."-". substr($_POST['tglawal'],0,2);
			$tglakhir = substr($_POST['tglakhir'],6,4)."-".substr($_POST['tglakhir'],3,2)."-". substr($_POST['tglakhir'],0,2);
			$tglsap = substr($_POST['tglsap'],6,4)."-".substr($_POST['tglsap'],3,2)."-". substr($_POST['tglsap'],0,2);
			
			$sql1 = "INSERT INTO surat_tugas(no_surat,nama,tgl_tugas,tgl_selesaitugas,tgl_sap,pejabat) VALUES ('$_POST[nosurattxt]','$_POST[kepada]','$_POST[tglawal]','$_POST[tglakhir]','$_POST[tglsap]','$_POST[pejabat]')";
			$proses1 = mysqli_query($koneksi,$sql1);
			if ($proses1) {
				echo "<script>alert('Penyimpanan data Surat berhasil !')</script>";
				include "input_sutuga.php";
			} 
		}else { 
				echo "<script>alert('Penyimpanan data Surat tidak berhasil !')</script>";
				include "pemesanan.php";
			}
	}	

?>