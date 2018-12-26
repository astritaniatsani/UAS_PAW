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
 <?php
$tanggal = date("d-m-Y");
$jam = date("H:i:s");
$sql = "select * from surat_kp where no_surat ='$_GET[no_surat]'";
$proses = mysql_query($sql);
$record = mysql_fetch_array($proses)
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
<p>


<table width="700" border="0" align="center">
  <tr>
  <td width="79">Nomor</td>
  <td width="12">:</td>
  <td width="595"><?php echo $record['no_surat']; ?></td>
  </tr>
   <tr>
  <td width="79">Lampiran</td>
  <td width="12">:</td>
  <td width="595"></td>
  </tr>
   <tr>
  <td width="79">Perihal</td>
  <td width="12">:</td>
  <td width="595">Permohonan Izin Kerja Praktik</td>
  </tr>
  </table>
   <?php
$sql = "select * from surat_tugas where no_surat ='$_GET[no_surat]'";
$proses = mysql_query($sql);
$record = mysql_fetch_array($proses)
?>
  
  <table width="700" border="0" align="center">
    <tr>
  <td width="80"></td>
  <td></td>
  <td width="592">Kepada Yth.<br></td>
  </tr>
   <tr>
  <td width="80"></td>
  <td width="14"></td>
  <td width="592"><b><?php echo $record['nama']; ?></td>
  </tr>
   <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592"><br></td>
  </tr>
  <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592"><font face="Times New Roman, Times, serif" size="3"><br>Assalamualaikum Wr. Wb</td>
  </tr>
  <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592"><p align="justify">Dekan Fakultas Sains dan Teknologi Universitas Islam Negeri Sunan Gunung Djati Bandung bahwa : </td>
  </tr>
</table>

<table width="700" border="0" align="center">
<tr>

    <td width="99">&nbsp;</td>
	<td>No</td>
    <td width="235">No</td>
    <td width="31">Nama</td>
    <td width="59">NIM</td>
    <td width="53">Semester</td>
    <td width="102"><center>Jurusan</td>
</tr>


  <?php
  $no=1;
$sql1 = "select * from rincian_surat inner join matkul on rincian_surat.kd_matkul = matkul.kd_matkul where rincian_surat.no_surat ='$record[no_surat]'";
$proses1 = mysql_query($sql1);
while ($record1 = mysql_fetch_array($proses1))
{		
?>


<tr>

<td></td>
  <td width="33" align="center" bgcolor="#FFFFFF" scope="col"><?php echo $no ?></td>
    <td width="235" align="left" bgcolor="#FFFFFF" scope="col"><?php echo $record1['nm_matkul']; ?></td>
    <td align="center" bgcolor="#FFFFFF" scope="col"><?php echo $record1['sks']; ?></td>
 <td width="59" align="center" bgcolor="#FFFFFF" scope="col"><?php echo $record1['semester']; ?></td>
 <td align="left" bgcolor="#FFFFFF" scope="col"><?php echo $record1['hari']; ?></td>
    <td width="102" align="left" bgcolor="#FFFFFF" scope="col"><?php echo $record1['jam']; ?></td>
    <td colspan="3" align="left" bgcolor="#FFFFFF" scope="col"><?php echo $record1['ruang']; ?></td>
 </tr>
 <?php $no++;}?>
</table>

  <table width="700" border="0" align="center">
    <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592"><p align="justify">adalah mahasiswa aktif Fakultas sains dan teknologi universitas islam negeri sunan gunung djati bandung tahun akademik  ,bermaksud mengadakan kerja praktik pada instansi persahaan yang bapak/ibu pimpin,yang akan dilaksanakan tanggal <?php echo $record['tgl_tugas']; ?> </td>
  </tr>
   <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592"><p align="justify">untuk itu kami memohon agar bapak/ibu dapat membantu mahasiswa kamidalam pelaksanaan kegiata dimaksud</td>
  </tr>
   <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592"><p align="justify">demikiamsurat ini kami sampaika. atas perkenaan dan kerjasamanya kami ucapkan terimakasih<br>Wassalamualaikum Wr.Wb.</br></p></td>
  </tr> 
  </tr>
   <tr>
  <td width="80"></td>
  <td></td>
  <td width="592" align="right">Bandung,<?php
$tgl =date("l, d F Y");
print"$tgl";
?><br /> Wakil Dekan Bidang Akademik</td>
  </tr>
  </tr>
   <tr>
  <td width="80">&nbsp;</td>
  <td>&nbsp;</td>
  <td width="592" align="right">&nbsp;</td>
  </tr>
  <tr>
  <td width="80">&nbsp;</td>
  <td></td>
  <td width="592" align="right">&nbsp;</td>
  </tr>
   <tr>
  <td width="80">&nbsp;</td>
  <td></td>
  <td width="592" align="right">&nbsp;</td>
  </tr>
  <tr>
  <td width="80">&nbsp;</td>
  <td></td>
  <td width="592" align="right"><b><?php echo $record['pejabat']; ?></td>
  </tr>
  <tr>
   <?php
$sql1 = "select * from surat_kp inner join dosen on surat_kp.pejabat = dosen.nm_dosen where surat_kp.pejabat ='$record[pejabat]'";
$proses = mysql_query($sql1);
$recordd = mysql_fetch_array($proses)
?>
  <td width="80">&nbsp;</td>
  <td></td>
  
  <td width="592" align="right"><b><?php echo $recordd['nip']; ?></td>
  </tr>
  
</table>

<script language="javascript">
window.print()
</script>
