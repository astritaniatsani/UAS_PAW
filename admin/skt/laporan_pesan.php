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
<form id="form1" name="form1" method="post" action="laporan_cetak.php?no_surat=<?php echo $row['no_surat']; ?>" target="new">
  <br><table width="800" height="47" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="700" align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFFF" face="Goudy Old Style" size="3"><strong>DATA SURAT KETERANGAN TAHFIDZ PERIODE :
 <input name="tglmulaitxt" type="text" id="tglmulaitxt" value="<?php echo $_POST['tglmulai'] ?>" size="10" readonly="readonly" />
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
      <th width="171" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">NIM </div></th>
      <th width="171" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">Nama </div></th>
      <th width="133" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">Tanggal Lulus</div></th>
      <th width="171" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="
      center">Jumlah Juz</div></th>
      <th width="180" align="left" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">Keterangan</div></th>
      <th width="159" align="right" bordercolor="#8A1328" bgcolor="#00AAAA" scope="col"><div align="center">Yang Menyetujui</div></th>
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
    
   
  </table>
</form>