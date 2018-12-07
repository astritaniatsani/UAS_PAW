<?php
session_start();
if ($_SESSION['username'] = $username)
{
$koneksi=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("sutuga",$koneksi);
$query=mysql_query("select * from admin where username='$username'",$koneksi);
$row=mysql_fetch_array($query);
}
else
header("location:bukan_member.php");
?>
<?php
if(isset($_POST['tambahbtn'])){
	if(!$_POST['kdmatkultxt']){
		echo "<script>alert('Data tidak boleh ada yang kosong !')</script>";
		echo "<meta http-equiv='refresh' content='rincian_sutuga.php'>";	
	}else {
		$sql = mysql_query("INSERT INTO rincian_surat(no_surat,kd_matkul,sks,kurikulum,hari,jam,ruang) VALUES ('$_POST[nosurattxt]','$_POST[kdmatkultxt]','$_POST[skstxt]','$_POST[kurikulumtxt]','$_POST[hari]','$_POST[jam]','$_POST[ruang]')");
		include "rincian_sutuga.php";
	}
}else {
			$sql = "select * from rincian_surat where no_surat ='$_POST[nosurattxt]'";
		$proses = mysql_query($sql);
		$record = mysql_num_rows($proses);
		if ($record>=1){
			
			$tglawal = substr($_POST['tglawal'],6,4)."-".substr($_POST['tglawal'],3,2)."-". substr($_POST['tglawal'],0,2);
			$tglakhir = substr($_POST['tglakhir'],6,4)."-".substr($_POST['tglakhir'],3,2)."-". substr($_POST['tglakhir'],0,2);
			$tglsap = substr($_POST['tglsap'],6,4)."-".substr($_POST['tglsap'],3,2)."-". substr($_POST['tglsap'],0,2);
			
			$update = mysql_query("UPDATE surat_tugas set nama='$_POST[nama]', tgl_tugas='$_POST[tgl_tugas]',tgl_selesaitugas='$tgl_Selesaitugas',tgl_sap='$tgl_sap',pejabat='$pejabat' where no_surat='$_POST[no_surat]'");
			
			if ($update) {
				echo "<script>alert('Penyimpanan data Surat berhasil !')</script>";
				include "input_sutuga.php";
			} 
		}else { 
				echo "<script>alert('Penyimpanan data Surat tidak berhasil !')</script>";
				include "pemesanan.php";
			}
	}	

?>