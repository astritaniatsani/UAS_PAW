<?php
session_start();
if ($_SESSION['username'] = $username)
{
$koneksi=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("skt",$koneksi);
$query=mysql_query("select * from admin where username='$username'",$koneksi);
$row=mysql_fetch_array($query);
}
else
header("location:bukan_member.php");
?>

<table width="700" border="0" align="center">
  <tr>
    <td rowspan="5" align="center">&nbsp;</td>
    <td align="center"><font face="Times New Roman, Times, serif" size="2">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><font face="Times New Roman, Times, serif" size="2">&nbsp;</td>

  </tr>
  <tr>
    <td  align="center"><font face="Times New Roman, Times, serif" size="3">&nbsp;</td>

  </tr>
  <tr>
    <td  align="center"><font face="Times New Roman, Times, serif" size="3">&nbsp;</td>

  </tr>
  <tr>
    <td  align="center"><font face="Times New Roman, Times, serif" size="-5">&nbsp;</td>
  </tr>
  <th colspan="5" align="center" scope="col">
</table>
<table width="700" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <th colspan="5" align="center" scope="col">LAPORAN SURAT Tahfidz</th>
  </tr>
  <tr>
    <th colspan="5" align="center" scope="col">PERIODE</th>
  </tr>
  <tr>
    <th colspan="5" align="center" scope="col"><b><font color="#990000"><?php echo $_POST['tglskltxt'] ?> </font></b></th>
  </tr>
  <tr>
    <th colspan="5" align="center" scope="col"><hr /></th>
  </tr>
  <tr>
    <th width="5%" align="center" scope="col" bgcolor="#CCCCCC">No</th>
    <th width="28%" align="center" scope="col" bgcolor="#CCCCCC">No Surat</th>
    <th width="20%" align="center" scope="col" bgcolor="#CCCCCC">NIM</th>
    <th width="45%" align="center" scope="col" bgcolor="#CCCCCC">Nama</th>
    <th width="17%" align="center" scope="col" bgcolor="#CCCCCC">Tanggal Lulus</th>  
    <th width="17%" align="center" scope="col" bgcolor="#CCCCCC">Jumlah Juz</th>
    <th width="30%" align="center" scope="col" bgcolor="#CCCCCC">Keterangan</th>
    <th width="30%" align="center" scope="col" bgcolor="#CCCCCC">Pejabat</th>
  </tr>

<?php
$no=1;
$tgl1 = substr($_POST['tglskt'],6,4)."-".substr($_POST['tglskt'],3,2)."-". substr($_POST['tglskt'],0,2); 		
$sql = "select * from surat_skt where tgl_skt >='$tgl1' and tgl_skt <='$tgl2' order by id desc";
$proses = mysql_query($sql);
while ($record = mysql_fetch_array($proses))
{
$tgl = substr($record['tgl_skt'],8,2)."-".substr($record['tgl_skt'],5,2)."-". substr($record['tgl_skt'],0,4); 		
?>
    <tr>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $no ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['no_surat'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['nim_mahasiswa'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['nm_mahasiswa'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $tgl ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['juz'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['ket'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['pejabat'] ?></td>
    </tr>
    <?php $no++;}?>
 
 
 <tr>
 <th colspan="5" align="right"  bgcolor="#FFFFFF"></th>
  </tr>
    <tr>
 <th colspan="5" align="right"  bgcolor="#FFFFFF"></th>
  </tr>
  <tr>
 <th colspan="5" align="right"  bgcolor="#FFFFFF">Mengetahui</th>
  </tr>
  <tr>
  <td colspan="5">&nbsp;</td>
  </tr>
   <tr>
  <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
  <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
 <th colspan="5" align="right"  bgcolor="#FFFFFF">Admin Fakultas Sains dan Teknologi</th>
  </tr>
</table>

<script language="javascript">
window.print()
</script>
