<?php
session_start();
if ($_SESSION['username'] = $username)
{
$koneksi=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("_restorant",$koneksi);
$query=mysql_query("select status from user where username='$username'",$koneksi);
$row=mysql_fetch_array($query);
}
else
header("location:bukan_member.php");
?>
<br><table width="700" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="3"><b>DATA TRANSAKSI PEMESANAN</b></th></tr>
</table>
<table width="700" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <th width="10%" align="center" scope="col" bgcolor="#CCCCCC">No</th>
    <th width="17%" align="left" scope="col" bgcolor="#CCCCCC">Kode Transaksi</th>
    <th width="10%" align="left" scope="col" bgcolor="#CCCCCC">Meja</th>

    <th width="16%" align="left" scope="col" bgcolor="#CCCCCC">Tanggal</th>   
          
    <th width="14%" align="right" scope="col" bgcolor="#CCCCCC">Total</th>
    <th width="9%" align="Center" scope="col" bgcolor="#CCCCCC">Aksi</font></th>
</tr>

<?php
$no=1;
$sql = "select * from pemesanan order by pemesanan.id desc";
$proses = mysql_query($sql);
while ($record = mysql_fetch_array($proses))
{
$tgl = substr($record['tanggal'],8,2)."-".substr($record['tanggal'],5,2)."-". substr($record['tanggal'],0,4); 		
?>
  <tr>
    <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $no ?></td>
    <td align="left" scope="col" bgcolor="#FFFFFF"><?php echo $record['no_transaksi'] ?></td>
    <td align="left" scope="col" bgcolor="#FFFFFF"><?php echo $record['no_meja'] ?></td>
    <td align="left" scope="col" bgcolor="#FFFFFF"><?php echo $tgl ?></td>
    
    <td align="right" scope="col" bgcolor="#FFFFFF"><?php echo number_format($record['total'], 0, ',','.') ?></td>
    <td align="Center" scope="col" bgcolor="#FFFFFF">
    <a href="pemesanan_form_rinci.php?no_transaksi=<?php echo $record['no_transaksi']; ?>" title="Rincian Data" target="_self"><img src="images/ubah.png" width="15" height="15" /></a>&nbsp;&nbsp;<a onclick="return confirm('Yakin data pemesanan ini akan di hapus?');" href="pemesanan_hapus.php?no_transaksi=<?php echo $record['no_transaksi']; ?>"><img src="images/hapus.png" width="15" height="15" /></a></td>
  </tr>

<?php $no++;}?>

</table>
