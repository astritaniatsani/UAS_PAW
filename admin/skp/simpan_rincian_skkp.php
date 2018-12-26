<?php
session_start();
if ($_SESSION['username'] = $username)
{
$koneksi=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("skp",$koneksi);
$query=mysql_query("select * from admin where username='$username'",$koneksi);
$row=mysql_fetch_array($query);
}
else
header("location:bukan_member.php");
?>
<?php
if(isset($_POST['tambahbtn'])){
	if(!$_POST['nimmahasiswatxt']){
			echo "<script>alert('Data tidak boleh ada yang kosong !')</script>";
			echo "<meta http-equiv='refresh' content='pemesanan.php'>";	
		}else {
			$sql = mysqli_query($koneksi,"INSERT INTO rincian_surat(no_surat,nm_mahasiswa,nim_mahasiswa,semester,jurusan,tempat,tujuan,judul,tgl_skp,pejabat,pejabat,pejabat) VALUES ('$_POST[nosurattxt]','$_POST[nmmahasiswatxt]','$_POST[nimmahasiswatxt]','$_POST[semestertxt]','$_POST[jurusantxt]''$_POST[tempattxt]','$_POST[tujuantxt]','$_POST[judultxt]','$_POST[tgl_skptxt]','$_POST[pejabattxt]','$_POST[pejabattxt]','$_POST[pejabattxt]')");
		include "pemesanan.php";
	}
}else {
			$sql = "select * from rincian_surat where no_surat ='$_POST[nosurattxt]'";
		$proses = mysql_query($sql);
		$record = mysql_num_rows($proses);
		if ($record>=1){
			
			$tglskp= substr($_POST['tglawal'],6,4)."-".substr($_POST['tglawal'],3,2)."-". substr($_POST['tglawal'],0,2);
			
			$update = mysql_query("UPDATE surat_kp set nama='$_POST[nama]', tgl_kp='$_POST[tgl_skp]',pejabat='$pejabat' where no_surat='$_POST[no_surat]'");
			
			if ($update) {
				echo "<script>alert('Penyimpanan data Surat berhasil !')</script>";
				include "input_skkp.php";
			} 
		}else { 
				echo "<script>alert('Penyimpanan data Surat tidak berhasil !')</script>";
				include "pemesanan.php";
			}
	}	

?>