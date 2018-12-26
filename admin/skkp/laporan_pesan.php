<?php
session_start();
if ($_SESSION['username'] = $username)
{
$koneksi=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("skkp",$koneksi);
$query=mysql_query("select * from admin where username='$username'",$koneksi);
$row=mysql_fetch_array($query);
}
else
header("location:bukan_member.php");
?>
<form id="form1" name="form1" method="post" action="laporan_cetak.php?no_surat=<?php echo $row['no_surat']; ?>" target="new">
  <br><table width="800" height="47" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="700" align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFFF" face="Goudy Old Style" size="3"><strong>DATA SURAT KERJA PRAKTIK PERIODE :
 <input name="tglmulaitxt" type="text" id="tglmulaitxt" value="<?php echo $_POST['tglmulai'] ?>" size="10" readonly="readonly" />
 S/D
  <input name="tglsampaitxt" type="text" id="tglsampaitxt" value="<?php echo $_POST['tglsampai'] ?>" size="10" readonly="readonly" />
      </strong></font></td>
  <td width="70" align="right" valign="middle" bgcolor="#9D0000"><a href="laporan_cetak.php">
    <center><input type=image img src="images/cetak.png" width="16" height="16" title="Cetak" />
  </a></td>
  </tr>
</table>
  <table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <th width="28" align="center" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">No</div></th>
      <th width="169" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">No Surat</div></th>
      <th width="171" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">Nama Mahasiswa</div></th>
      <th width="171" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">Tempat Kerja Praktik</div></th>
      <th width="133" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">Tanggal kerja praktik</div></th>
      <th width="159" align="right" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">Pejabat</div></th>
    </tr>
    <?php
$no=1;
$tgl1 = substr($_POST['tglmulai'],6,4)."-".substr($_POST['tglmulai'],3,2)."-". substr($_POST['tglmulai'],0,2); 	
$tgl2 = substr($_POST['tglsampai'],6,4)."-".substr($_POST['tglsampai'],3,2)."-". substr($_POST['tglsampai'],0,2); 	
$sql = "select * from surat_kp where tgl_kp >='$tgl1' and tgl_kp <='$tgl2' order by id desc";
$proses = mysql_query($sql);
while ($record = mysql_fetch_array($proses))
{
$tgl = substr($record['tgl_kp'],8,2)."-".substr($record['tgl_kp'],5,2)."-". substr($record['tgl_kp'],0,4); 		
?>
    <tr>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $no ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['no_surat'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['nm_mahasiswa'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['kepada'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $tgl ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record['pejabat'] ?></td>
    </tr>
    <?php $no++;}?>
    
   
  </table>
</form>