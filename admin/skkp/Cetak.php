<?php 
  session_start();
  include '../../koneksi.php';
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['status']==""){
    header("location:../../index.php?pesan=gagal");
  }
  ?>
 <?php
$tanggal = date("d-m-Y");
$jam = date("H:i:s");
$no_surat=$_GET['no_surat'];
$sql =  "select * from rincian_surat_kkp inner join surat_kerja_praktik on rincian_surat_kkp.no_surat_kkp = surat_kerja_praktik.no_surat_kkp where rincian_surat_kkp.no_surat_kkp ='$no_surat'";
$proses = mysqli_query($koneksi,$sql);
$record = mysqli_fetch_array($proses)

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
  <th colspan="5" align="center" scope="col">
</table>
<p>
<table width="600" border="0" align="center">
  <tr>
  <td colspan="5">Nomor&emsp;&emsp;:&ensp;<?php echo $no_surat ?></td>
  </tr>
  <tr>
  <td colspan="5">Lampiran&emsp;:&ensp; - </td>
  </tr>
  <tr>
  <td colspan="5">Perihal&emsp;&emsp;:&ensp;<b><i>Permohonan Izin Kerja Praktik</td>
  </tr>
  <tr>
  <td>Kepada Yth . </p></td>
  </tr>
  <tr>
  <td><?php echo $record['kepada']; ?></p></td>
  </tr>
   <tr><td>&nbsp;</td></tr>
  <tr>
  <td colspan="5"><p style="text-align: justify; text-indent: 0.5in;"><i>Assalamu'alaikum Wr. Wb</p></td>
  </tr>
  <tr>
  <td colspan="5""><p style="text-align: justify; text-indent: 0.5in;">Dekan Fakultas Sains dan Teknologi UIN Sunan Gunung Djati Bandung dengan ini menerangkan bahwa :  </p></td>
  </tr>
   <tr><td>&nbsp;</td></tr>
<tr>
  <td align="center" width="5">No</td>
    <td align="center" width="20">Nim</td>
    <td align="center" width="30">Nama</td>
    <td align="center" width="10">Semester</td>
    <td align="center" width="20">Jurusan</td>
</tr>

  <?php
  $no=1;
$sql1 = "select * from rincian_surat_kkp inner join surat_kerja_praktik on rincian_surat_kkp.no_surat_kkp = surat_kerja_praktik.no_surat_kkp where rincian_surat_kkp.no_surat_kkp ='$no_surat'";
$proses1 = mysqli_query($koneksi,$sql1);
while ($record1 = mysqli_fetch_array($proses1))
{   
?>
<tr>
  <td align="center" bgcolor="#FFFFFF" scope="col"><?php echo $no ?></td>
    <td  bgcolor="#FFFFFF" scope="col"><?php echo $record1['nim']; ?></td>
    <td bgcolor="#FFFFFF" scope="col"><?php echo $record1['nm_mhs']; ?></td>
 <td align="center" bgcolor="#FFFFFF" scope="col"><?php echo $record1['semester']; ?></td>
 <td bgcolor="#FFFFFF" scope="col"><?php echo $record1['jurusan']; ?></td>
 </tr>
 <?php $no++;}?>
<tr><td>&nbsp;</td></tr>
 <tr>
  <td colspan="5" align="justify">adalah mahasiswa Fakultas Sains dan Teknologi Universitas Islam Negeri Sunan Gunung Djati Bandung tahun Akademik <?php echo $record['akademik']; ?>. Bermaksud mengadakan kerja praktik pada Instansi perusahaan yang Bapak/Ibu pimpin, yang akan dilaksakan pada tanggal <?php echo $record['tgl_awal_skkp']; ?> sampai <?php echo $record['tgl_slsai_skkp']; ?>.  </td>
  </tr>
   <tr>
  <td colspan="5" width="592"><p style="text-align: justify; text-indent: 0.5in;">Untuk itu kami mohon Bapak/Ibu dapat membantu mahasiswa kami dlam pelaksaaan penelitian terseut.</p</td>
  </tr>
  <tr>
  <td colspan="5" width="592"><p style="text-align: justify; text-indent: 0.5in;">Demikian keterangan ini dibuat untuk digunakan sebagaimana mestinya. </p</td>
  </tr>
  <tr>
  <td colspan="5" width="592"><p style="text-align: justify; text-indent: 0.5in;"><b><i>Wassalamu'alaikum Wr. Wb </p</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
  <td align="right" colspan="5">Bandung, <?php echo $tanggal ?></td>
  <br></tr>
  <tr>
<td align="right" colspan="5">Wakil Dekan Bidang Akademik,<br><br><br><br></td>
  </tr>
  <tr>
    <tr>
<td align="right" colspan="5"><b><?php echo $record['pejabat'] ?></td>
  </tr>
  <tr>
    <tr>
<td align="right" colspan="5">NIP.<?php echo $record['nip'] ?></td>
  </tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
  <tr>
  <td colspan="5" align="justify">Tembusan disampaikan kepada Yth:<br>Dekan Fakultas Sains dan Teknologi UIN SGD Bandung</td>
  </tr>
  </table>
<script language="javascript">
window.print()
</script>
