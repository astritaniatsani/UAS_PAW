<?php 

  include '../../koneksi.php';
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['status']==""){
    header("location:../../index.php?pesan=gagal");
  }
  ?>
<link href="../../JQuery/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet">

<SCRIPT language=Javascript>

function isNumberKey(evt)
//Membuat validasi hanya untuk input angka menggunakan kode javascript
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}
</script>
<script type="text/javascript" src="../../JQuery/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../../JQuery/jquerycssmenu.js"></script>
<script src="../../JQuery/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	function cari_menu(){
    var kode=$("#nimtxt").val();
      if(kode!=""){
        $.ajax({
          type:"post",
          url:"cari_menu.php",
          data:"kode="+kode,
          success:function(data){
          $("#mhstxt").val(data)
          }
        });
      }                                      
   
  var kode1=$("#nimtxt").val();
      if(kode1!=""){
        $.ajax({
          type:"post",
          url:"cari_menu.php",
          data:"kode1="+kode1,
          success:function(data){
          $("#jurusantxt").val(data)
          }
        });
      } 
  var kode2=$("#niptxt").val();
      if(kode2!=""){
        $.ajax({
          type:"post",
          url:"cari_menu.php",
          data:"kode2="+kode2,
          success:function(data){
          $("#pejabattxt").val(data)
          }
        });
      } 
  }
  
  $('#nimtxt').change(function() {
    cari_menu();
    $("#jmltxt").focus()  
    });

  $('#niptxt').change(function() {
    cari_menu();
    $("#jmltxt").focus()  
    });   
    
})    
</script>


<?php

$view = mysqli_query($koneksi,"select * from surat_kerja_praktik order by id desc");
$record = mysqli_fetch_array($view);

$kode = $record['id']+1;
$bulan = Date("m");
$tahun = Date("Y");

?>
<br><table width="700" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="4"><center><b>SURAT KETERANGAN KERJA PRAKTIK</b></th>
</tr>
</table><br>
<form id="form1" name="form1" method="post" action="pemesanan_simpan.php"> 
  <table width="700" border="0" align="center">
      <tr>
      <td width="14%" align="left" valign="middle">No Surat</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="nosurattxt" type="text" id="nosurattxt" value="<?php echo $_POST['nosurattxt']; ?>" size="30" maxlength="50" readonly="readonly"  /></td>
      
    </tr>
      <tr>
      <td width="14%" align="left" valign="middle">Kepada</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><input name="kepadatxt" type="text" id="kepada" size="30" maxlength="100" value="<?php echo $_POST['kepadatxt']; ?>"/></td>
      
    </tr>
    <tr>
      <td align="left" valign="middle">Nip</td>
      <td align="left" valign="middle">:</td>
      <td colspan="4" align="left" valign="top"><input name="niptxt" type="text" id="niptxt" value="<?php echo $_POST['niptxt']; ?>" size="30" maxlength="100"/></td>
    </tr>
      <td align="left" valign="middle">Yang Menandatangani </td>
      <td align="left" valign="middle">:</td>
      <td colspan="4" align="left" valign="top"><input name="pejabattxt" value="<?php echo $_POST['pejabattxt']; ?>" type="text" id="pejabattxt" size="20" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Nim </td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nimtxt" type="text" id="nimtxt"pejabattxt" size="20"  /></td>
      <td align="left" valign="middle">Nama Mahasiswa</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="mhstxt" type="text" id="mhstxt"pejabattxt" size="20"  /></td></tr>
      <tr>
      <td align="left" valign="middle">Semester</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="semestertxt" type="text" id="semestertxt" size="30" maxlength="50" /></td>
      <td align="left" valign="middle">Jurusan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="jurusantxt" type="text" id="jurusantxt" size="30" maxlength="50" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tanggal</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglawal" type="text" id="tglawal" value="<?php echo $_POST['tglawal']; ?>" size="9" maxlength="5" readonly="readonly" /> 
	  Sampai <input name="tglakhir" type="text" id="tglakhir" value="<?php echo $_POST['tglakhir']; ?>" size="9" maxlength="5" readonly="readonly" /></td>
    </tr>
    
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td colspan="4" align="left" valign="top"><input type="submit" name="tambahbtn" id="tambahbtn" value="Tambah" />
      <input type="submit" name="prosesbtn" id="prosesbtn" value=" Proses " /></td>
    </tr>
    
    <tr>
      <td colspan="6" align="left" valign="top"><hr /></td>
    </tr>

    <tr>
      <td colspan="6" align="left" valign="top">
     
      
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <th width="5%" bgcolor="#00FFFF" scope="col">No</th>
          <th width="30%" align="left" bgcolor="#00FFFF" scope="col">No Surat </th>
          <th width="15%" align="left" bgcolor="#00FFFF" scope="col">Tujuan Kerja Praktik </th>
          <th width="15%" align="center" bgcolor="#00FFFF" scope="col">Nama</th>
          <th width="25%" align="center" bgcolor="#00FFFF" scope="col">Tanggal</th>
        </tr>
        
<?php
$no=1;
$surat= $_POST['nosurattxt'];
$sql1 = "select * from rincian_surat_kkp";
$proses1 = mysqli_query($koneksi,$sql1);
while ($record1 = mysqli_fetch_array($proses1))
{
?>   
     
     	<tr>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $no ?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['no_surat_kkp'] ?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['kepada']?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['nm_mhs']?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['semester']?></td>
        </tr>
        
<?php $no++;}?>    
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td colspan="4" align="left" valign="top"></td>
    </tr>
  </table>
</form>
