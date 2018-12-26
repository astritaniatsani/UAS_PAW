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
$sql = "select * from surat_penelitian where no_surat_kp ='$_GET[no_surat]'";
$proses = mysqli_query($koneksi,$sql);
$record = mysqli_fetch_array($proses)
?>
<?php

/*$sql1 = mysqli_query($koneksi,"select no_surat_tahfidz,tanggal from surat_tahfidz");

//kemudian di simpan dalam variabel dua data di atas
$tanggal=$sql1['tanggal'];
$no_surat_tahfidz=$sql1['no_surat_tahfidz'];

//di sini kita menggunakan fungsi list dalam php
list($no_surat_tahfidz,$tanggal) = mysqli_fetch_row($sql1);

//pisahkan tanggal
$array1=explode("-",$tanggal);
$tahun=$array1[0];
$bulan=$array1[1];
$sisa1=$array1[2];
$array2=explode(".",$sisa1);
$tanggal=$array2[0];
$sisa2=$array2[1];

//ubah nama bulan menjadi bahasa indonesia
switch($bulan)
{
case"01";
$bulan="Januari";
break;
case"02";
$bulan="Februari";
break;
case"03";
$bulan="Maret";
break;
case"04";
$bulan="April";
break;
case"05";
$bulan="Mei";
break;
case"06";
$bulan="Juni";
break;
case"07";
$bulan="Juli";
break;
case"08";
$bulan="Agustus";
break;
case"09";
$bulan="September";
break;
case"10";
$bulan="Oktober";
break;
case"11";
$bulan="November";
break;
case"12";
$bulan="Desember";
break;
}*/

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
  <td colspan="3">Nomor&emsp;&emsp;:&ensp;<?php echo $record['no_surat_kp']; ?></td>
  </tr>
  <tr>
  <td colspan="3">Lampiran&emsp;:&ensp; - </td>
  </tr>
  <tr>
  <td colspan="3">Perihal&emsp;&emsp;:&ensp;<b><i>Permohonan Izin Kerja Praktik</td>
  </tr>
  <tr>
  <td>Kepada Yth . </p></td>
  </tr>
  <tr>
  <td><?php echo $record['tujuan']; ?></p></td>
  </tr>
   <tr><td>&nbsp;</td></tr>
  <tr>
  <td colspan="3"><p style="text-align: justify; text-indent: 0.5in;"><i>Assalamu'alaikum Wr. Wb</p></td>
  </tr>
  <tr>
  <td colspan="3" width="592"><p style="text-align: justify; text-indent: 0.5in;">Dekan Fakultas Sains dan Teknologi UIN Sunan Gunung Djati Bandung dengan ini menerangkan bahwa :  </p></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <td colspan="3"><p style="text-align: justify; text-indent: 0.5in;">Nama&emsp;&emsp;&emsp;:&ensp;<?php echo $record['nm_mhs']; ?></p></td>
  </tr>
  <tr>
  <td colspan="3"><p style="text-align: justify; text-indent: 0.5in;">Nim&emsp;&emsp;&emsp;&ensp;&nbsp;:&ensp;<?php echo $record['nim']; ?></p></td>
  </tr>
  <tr>
  <td colspan="3"><p style="text-align: justify; text-indent: 0.5in;">Jurusan&emsp;&emsp;&ensp;:&ensp;<?php echo $record['jurusan']; ?></p></td>
  </tr>
   <tr>
  <td colspan="3"><p style="text-align: justify; text-indent: 0.5in;">Semester&emsp;&emsp;:&ensp;<?php echo $record['semester']; ?></p></td>
  </tr>
   <tr><td>&nbsp;</td></tr>
  <tr>
 
  <td colspan="3" align="justify">adalah mahasiswa Fakultas Sains dan Teknologi Universitas Islam Negeri Sunan Gunung Djati Bandung tahun Akademik <?php echo $record['akademik']; ?>. Bermaksud melakukan Uji Karakteristik SEM Sample Besi (Ukuran3x10x10 mm ) dalam rangka tugas akhir dengan judul :<b><i>"<?php echo $record['judul']; ?>," dengan dosen pembimbing .  </td>
  </tr>
  <tr>
   <td colspan="2"><p style="text-align: justify; text-indent: 0.5in;">1&emsp;&emsp;&emsp;<?php echo $record['dospem1']; ?> </p></td>
   <td>(Pembimbing I)</td>
  </tr>
   <tr>
  <td colspan="2"><p style="text-align: justify; text-indent: 0.5in;">2&emsp;&emsp;&emsp;<?php echo $record['dospem2']; ?> </p></td>
  <td>(Pembimbing II)</td>
  </tr>
   <tr>
  <td colspan="3" width="592"><p style="text-align: justify; text-indent: 0.5in;">Untuk itu kami mohon Bapak/Ibu dapat membantu mahasiswa kami dlam pelaksaaan penelitian terseut.</p</td>
  </tr>
  <tr>
  <td colspan="3" width="592"><p style="text-align: justify; text-indent: 0.5in;">Demikian keterangan ini dibuat untuk digunakan sebagaimana mestinya. </p</td>
  </tr>
  <tr>
  <td colspan="3" width="592"><p style="text-align: justify; text-indent: 0.5in;"><b><i>Wassalamu'alaikum Wr. Wb </p</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
  <td align="right" colspan="3">Bandung, <?php echo $tanggal ?></td>
  <br></tr>
  <tr>
<td align="right" colspan="3">Wakil Dekan Bidang Akademik,<br><br><br><br></td>
  </tr>
  <tr>
    <tr>
<td align="right" colspan="3"><b><?php echo $record['pejabat'] ?></td>
  </tr>
  <tr>
    <tr>
<td align="right" colspan="3">NIP.<?php echo $record['nip'] ?></td>
  </tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
  <tr>
  <td colspan="3" align="justify">Tembusan disampaikan kepada Yth:<br>Dekan Fakultas Sains dan Teknologi UIN SGD Bandung</td>
  </tr>
  </table>

<script language="javascript">
window.print()
</script>
