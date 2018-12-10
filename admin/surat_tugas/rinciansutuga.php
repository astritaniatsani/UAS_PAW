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
		var kode=$("#kdmatkultxt").val();
			if(kode!=""){
				$.ajax({
					type:"post",
					url:"cari_menu.php",
					data:"kode="+kode,
					success:function(data){
					$("#nmmatkultxt").val(data)
					}
				});
			}		                                   
	 
	var kode1=$("#kdmatkultxt").val();
			if(kode1!=""){
				$.ajax({
					type:"post",
					url:"cari_menu.php",
					data:"kode1="+kode1,
					success:function(data){
					$("#skstxt").val(data)
					}
				});
			} 
	
	
	var kode2=$("#kdmatkultxt").val();
			if(kode2!=""){
				$.ajax({
					type:"post",
					url:"cari_menu.php",
					data:"kode2="+kode2,
					success:function(data){
					$("#kurikulumtxt").val(data)
					}
				});
			} 
	}
	
	$('#kdmatkultxt').change(function() {
		cari_menu();
		$("#jmltxt").focus()	
    });		
		
})		
</script>

<?php

$view = mysql_query("select * from surat_tugas where no_surat ='$_GET[no_surat]'");
$record = mysql_fetch_array($view);
$kode = $record['id']+1;
$bulan = Date("m");
$tahun = Date("Y");

?>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th width="660" align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="4"><center><b>SURAT TUGAS</b></th>
  <th width="40" align="right" bgcolor="#9D0000" scope="col"><a href="cetak.php?no_surat=<?php echo $record['no_surat']; ?>"><img src="images/cetak.png" /></tr>

</tr>
</table><br>
<form id="form1" name="form1" method="post" action="simpan_rincian_sutuga.php?no_surat=<?php echo $record['no_surat']; ?>">
  <table width="700" border="0" align="center">
      <tr>
      <td width="14%" align="left" valign="middle">No Surat</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="nosurattxt" type="text" id="nosurattxt" value="<?php echo $record['no_surat']; ?>" size="30" maxlength="50" readonly="readonly"  /></td>
      
    </tr>
      <tr>
      <td width="14%" align="left" valign="middle">Kepada</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><input name="kepada" type="text" id="kepada" value="<?php echo $record['nama']; ?>" readonly="readonly"/></td>
      <td align="left" valign="middle">Pejabat</td>
      <td align="left" valign="middle">:</td>
      <td colspan="4" align="left" valign="top"><input name="pejabat" value="<?php echo $record['pejabat']; ?>"type="text" id="pejabat" size="20" maxlength="50"/></td>
    </tr>
    <tr>
      <td width="14%" align="left" valign="middle">Kode Mata Kuliah</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><input name="kdmatkultxt" type="text" id="kdmatkultxt" size="30" maxlength="50" />
    </tr>
    <tr>
      <td align="left" valign="middle">Mata Kuliah</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nmmatkultxt" type="text" id="nmmatkultxt" size="30" maxlength="50" readonly="readonly"/></td>
      <td align="left" valign="middle">SKS</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="skstxt" type="text" id="skstxt" size="20" maxlength="50" readonly="readonly" /></td>
    <tr>
    <tr>
      <td align="left" valign="middle">Tanggal</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglawal" type="text" id="tglawal" value="<?php echo $record['tgl_tugas']; ?>" size="6" maxlength="5" readonly="readonly" /> 
	  Sampai <input name="tglakhir" type="text" id="tglakhir" value="<?php echo $record['tgl_selesaitugas']; ?>" size="6" maxlength="5" readonly="readonly" /></td>
      
      <td align="left" valign="middle">Hari</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><select name="hari" id="hari">
												<option value="Senin">Senin</option>
												<option value="Selasa">Selasa</option>	
												<option value="Rabu">Rabu</option>
												<option value="Kamis">Kamis</option>		
												<option value="Jumat">Jumat</option>
												
												</select>
												</td>
      
    </tr>
    <tr>
      <td align="left" valign="middle">Semester </td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="kurikulumtxt" type="text" id="kurikulumtxt" size="30" maxlength="15" readonly="readonly" /></td>
      
      <td align="left" valign="middle">Pukul</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><select name="jam" id="jam">
												<option value="07.00 - 08.40">07.00 - 08.40</option>
												<option value="07.00 - 09.30">07.00 - 09.30</option>	
												<option value="08.40 - 10.20">08.40 - 10.20</option>
												<option value="09.30 - 12.00">09.30 - 12.00</option>		
												<option value="10.20 - 12.00">10.20 - 12.00</option>
												<option value="12.40 - 14.20">12.40 - 14.20</option>	
												<option value="12.40 - 15.20">12.40 - 15.20</option>
												<option value="15.30 - 18.00">15.30 - 18.00</option>	
												<option value="16.00 - 18.00">16.00 - 18.00</option>		
												</select>
												</td></tr>
    <tr>
      <td align="left" valign="middle">Tgl SAP</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglsap" type="text" id="tglsap" value="<?php echo $record['tgl_sap']; ?>" size="6" maxlength="10" readonly="readonly" /></td>
      
      <td align="left" valign="middle">Ruangan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><select name="ruang">
	  <?php include "koneksi.php";
	  
	  
		
		$tampil = mysql_query("select * from ruang order by kd_ruang asc");
		while($data = mysql_fetch_array($tampil))
		{
			echo'<option value="'.$data['nm_ruang'].'">'.$data['nm_ruang'].'</option>';
		}
		?>
		</select>
		</td>
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
          <th width="20%" align="left" bgcolor="#00FFFF" scope="col">Kode Matkul</th>
          <th width="30%" align="left" bgcolor="#00FFFF" scope="col">Nama Matkul</th>
          <th width="9%" align="center" bgcolor="#00FFFF" scope="col">SKS</th>
          <th width="10%" align="center" bgcolor="#00FFFF" scope="col">Semester</th>
          <th width="10%" align="left" bgcolor="#00FFFF" scope="col">Hari</th>
          <th width="13%" align="left" bgcolor="#00FFFF" scope="col">Pukul</th>
          <th width="13%" align="left" bgcolor="#00FFFF" scope="col">Ruang</th>
        </tr>
        
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
    	<td align="left" scope="col" bgcolor="#FFFFFF"><?php echo $record1['kd_matkul'] ?></td>
    	<td align="left" scope="col" bgcolor="#FFFFFF"><?php echo $record1['nm_matkul']?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php 
		$sks=$record1['jml_sks_T']+$record1['jml_sks_P']+$record1['jml_sks_PL'];
		echo $sks ?></td>
        <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['semester']?></td>
    	<td align="left" scope="col" bgcolor="#FFFFFF"><?php echo $record1['hari']?></td>
    	<td align="left" scope="col" bgcolor="#FFFFFF"><?php echo $record1['jam'] ?></td> 
        <td align="left" scope="col" bgcolor="#FFFFFF"><?php echo $record1['ruang'] ?></td>
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
