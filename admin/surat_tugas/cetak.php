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
$tanggal = date("d-m-Y");
$jam = date("H:i:s");
$sql = "select * from surat_tugas where no_surat ='$_GET[no_surat]'";
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
  <td width="595">Tugas Memberi kuliah Semester</td>
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
  <td width="592">Kepada Yth.<br>Bapak/Ibu</td>
  </tr>
   <tr>
  <td width="80"></td>
  <td width="14"></td>
  <td width="592"><b><?php echo $record['nama']; ?></td>
  </tr>
   <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592">Dosen Fakultas Sains dan Teknologi<br>UIN Sunan Gunung Djati Bandung</td>
  </tr>
  <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592"><font face="Times New Roman, Times, serif" size="3"><br>Assalamualaikum Wr. Wb</td>
  </tr>
  <tr>
  <td width="80">&nbsp;</td>
  <td width="14"></td>
  <td width="592"><p align="justify">Dengan ini kami sampaikan tugas/jadwal memberi kuliah pada semester ,     , taun akademik <?php echo $record['kurikulum']; ?> yang berlaku mulai tanggal   <?php echo $record['tgl_tugas']; ?> sampai  <?php echo $record['tgl_selesaitugas']; ?>, Adapun ketentuan pelaksanaannya sebagai beriku : </p></td>
  </tr>
</table>

<table width="700" border="0" align="center">
<tr>

    <td width="99">&nbsp;</td>
	<td>No</td>
    <td width="235">Mata Kuliah</td>
    <td width="31">Sks</td>
    <td width="59">jur/Sem</td>
    <td width="53">Hari</td>
    <td width="102"><center>Pukul</td>
    <td width="54">Ruang</td>
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
  <td width="80"></td>
  <td></td>
  <td width="592">Untuk ketertiban perkuliahan, Bapak/ibu dimohon memperhatikan hal-hal beriku:</td>
  </tr>
   <tr>
  <td width="80"></td>
  <td width="14">1. </td>
  <td width="592"><p align="justify">Dosen / Asisten berkewajiban menyelenggarakan tatap muka terjadwal sekurang-kurangnya 14 kali.</p></td>
  </tr>
  <tr>
  <td width="80"></td>
  <td width="14">2. </td>
  <td width="592"><p align="justify">Menyiapkan dan menyampaikan SAP kepada jurusan selambat-lambatnya tanggal <?php echo $record['tgl_sap']; ?> </p></td>
  </tr><tr>
  <td width="80"></td>
  <td width="14">3. </td>
  <td width="592"><p align="justify">Sebelum memulai perkuliahan agar mengecek daftar mahasiswa yang berhak mengikuti kuliah</p></td>
  </tr><tr>
  <td width="80"></td>
  <td width="14">4. </td>
  <td width="592"><p align="justify">Pada Akhir perkuliahan agar mengecek daftar Mahasiswa yang berhak untuk mengikuti ujian dan menyerahkan dokumennya kepda ketua jurusan, untuk mencetak kartu ujian.</p></td>
  </tr><tr>
  <td width="80"></td>
  <td width="14">5. </td>
  <td width="592"><p align="justify">Bagi Dosen 1/Dosen 2 yeng belum berhak melaksanakan kuliah mandiri, agar koordinasi dengan Dosen Pembina Mata Kuliah/Ketua Jurusan</p></td>
  </tr>
   <tr>
  <td width="80"></td>
  <td></td>
  <td width="592">Demikian tugas ini kami sampaikan, untuk dilaksanakan sebagaimana mestinya<br>Wassalamualaikum Wr.Wb.</td>
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
$sql1 = "select * from surat_tugas inner join dosen on surat_tugas.pejabat = dosen.nm_dosen where surat_tugas.pejabat ='$record[pejabat]'";
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
