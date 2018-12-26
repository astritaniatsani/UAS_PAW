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
<link href="JQuery/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet">

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
<script type="text/javascript" src="JQuery/jquery-1.9.1.js"></script>
<script type="text/javascript" src="JQuery/jquerycssmenu.js"></script>
<script src="JQuery/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		

	function cari_menu(){
    var kode=$("#nimmahasiswatxt").val();
      if(kode!=""){
        $.ajax({
          type:"post",
          url:"cari_menu.php",
          data:"kode="+kode,
          success:function(data){
          $("#nmmahasiswatxt").val(data)
          }
        });
      }                                      
   
  var kode1=$("#nimmahasiswatxt").val();
      if(kode1!=""){
        $.ajax({
          type:"post",
          url:"cari_menu.php",
          data:"kode1="+kode1,
          success:function(data){
          $("#semestertxt").val(data)
          }
        });
      } 
  
  
  var kode2=$("#nimmahasiswatxt").val();
      if(kode2!=""){
        $.ajax({
          type:"post",
          url:"cari_menu.php",
          data:"kode2="+kode2,
          success:function(data){
          $("#jurusantxt").val(data)
          }
        });
      } 
  }
  
  $('#nimmahasiswatxt').change(function() {
    cari_menu();
    $("#jmltxt").focus()  
    });   
		
})		
</script>

<?php

$view = mysql_query("select * from surat_kp where no_surat ='$_GET[no_surat]'");
$record = mysql_fetch_array($view);
$kode = $record['id']+1;
$bulan = Date("m");
$tahun = Date("Y");

?>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th width="660" align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="4"><center><b>SURAT KETERANGAN KERJA PRAKTIK</b></th>
  <th width="40" align="right" bgcolor="#9D0000" scope="col"><a href="cetak.php?no_surat=<?php echo $record['no_surat']; ?>"><img src="images/cetak.png" /></tr>

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
      <td width="41%" align="left" valign="middle"><input name="kepada" type="text" id="kepada" value="<?php echo $_POST['kepada']; ?>" maxlength="100" readonly="readonly"/></td>
    </tr>
    <tr>
      <td width="14%" align="left" valign="middle">Nim Mahasiswa</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><input name="nimmahasiswatxt" type="text" id="nimmahasiswatxt" size="30"  />
    </tr>
    <tr>
      <td align="left" valign="middle">Nama Mahasiswa</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nmmahasiswatxt" type="text" id="nmmahasiswatxt" size="30" maxlength="50" readonly="readonly"/></td></tr>
      <tr>
      <td align="left" valign="middle">Semester</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="semestertxt" type="text" id="semestertxt" size="30" maxlength="50" readonly="readonly"/></td></tr>
      <tr>
      <td align="left" valign="middle">Jurusan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="jurusantxt" type="text" id="jurusantxt" size="30" maxlength="50" readonly="readonly"/></td></tr>
    <tr>
      <td align="left" valign="middle">Tanggal</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglawal" type="text" id="tglawal" value="<?php echo $_POST['tglawal']; ?>" size="6" maxlength="5" readonly="readonly" /> 
    Sampai <input name="tglakhir" type="text" id="tglakhir" value="<?php echo $_POST['tglakhir']; ?>" size="6" maxlength="5" readonly="readonly" /></td>
    </tr>
    <tr>
       <td align="left" valign="middle">Pejabat</td>
      <td align="left" valign="middle">:</td>
      <td colspan="4" align="left" valign="top"><input name="pejabat" value="<?php echo $_POST['pejabat']; ?>" type="text" id="pejabat" size="20" /></td>
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
        
<?php
$no=1;
$nosurat ="B$kode/Uin.05/III.7/PP.00.9/$bulan/$tahun";
$sql1 = "select * from rincian_surat inner join matkul on rincian_surat.kd_matkul = matkul.kd_matkul where rincian_surat.no_surat ='$record[no_surat]'";

$proses1 = mysql_query($sql1);
while ($record1 = mysql_fetch_array($proses1))
{
?>   
     
     	<tr>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $no ?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['nim_mahasiswa'] ?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['nm_mahasiswa']?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['semester']?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['jurusan']?></td>
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
