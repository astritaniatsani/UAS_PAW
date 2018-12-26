
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
  $("#tgllahir").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});

  
})
</script>
<?php

$view = mysqli_query($koneksi,"select * from surat_lulus order by id desc");
$record = mysqli_fetch_array($view);

$kode = $record['id']+1;
$bulan = Date("m");
$tahun = Date("Y");

?>
<br><table width="700" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="4"><center><b>SURAT KETERANGAN LULUS</b></th>
</tr>
</table><br>
<form id="form1" name="form1" method="post" action="pemesanan_simpan.php">
  <table width="700" border="0" align="center">
      <tr>
      <td width="14%" align="left" valign="middle">No Surat</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="nosurattxt" type="text" id="nosurattxt" value="<?php echo $_POST['nosurattxt']; ?>" size="30" maxlength="50" readonly="readonly"  /></td>
    <tr>
      <td align="left" valign="middle">Pejabat</td>
      <td align="left" valign="middle">:</td>
      <td colspan="left" align="left" valign="top"><input name="pejabat" value="<?php echo $_POST['pejabat']; ?>" type="text" id="pejabat" size="30" />
      </td>
      <td width="left" align="left" valign="middle">NIP</td>
      <td width="left" align="left" valign="middle">:</td>
      <td width="left" align="left" valign="middle"><input name="nip" type="text" id="nip" maxlength="100" size="30" readonly="readonly"/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Pangkat/Gol</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="statustxt" type="text" id="statustxt" size="30"  maxlength="50" /></td>
      <td align="left" valign="middle">Jabatan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="jabatantxt" type="text" id="jabatantxt" size="30"   maxlength="50" /></td>
    </tr>    
    <tr>
      <td align="left" valign="middle">Nama</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="mhs" value="<?php echo $_POST['mhs']; ?>" type="text" id="mhs" size="30" /></td>
  
      <td width="left" align="left" valign="middle">Nim </td>
      <td width="left" align="left" valign="middle">:</td>
      <td width="left" align="left" valign="middle"><input name="nimmahasiswatxt" type="text" id="nimmahasiswatxt" size="30" /></td>
    </tr>

    <?php
    include '../../koneksi.php';
    $mhs= $_POST['mhs'];
    $vieww = mysqli_query($koneksi,"select * from mahasiswa where nama = '$mhs' ");
    $recordd = mysqli_fetch_array($vieww);
    ?>
    <tr>
      <td align="left" valign="middle">Jurusan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="jurusantxt" type="text" id="jurusantxt" size="30" maxlength="50" value="<?php echo $_recordd['jurusan']; ?>" readonly="readonly"/></td>
      <td align="left" valign="middle">IPK</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="ipktxt" type="text" id="ipktxt" size="30" maxlength="50" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tempat, Tgl Lahir </td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tmp_lahirtxt" type="text" id="tmp_lahirtxt" size="30" maxlength="50" /></td>
   
      <td align="left" valign="middle">Tgl Lahir</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tgllahir" type="text" id="tgllahir" value="<?php echo date('d-m-Y') ?>" size="15" maxlength="5" readonly="readonly" />  </td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tgl Lulus</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglskl" type="text" id="tglskl" value="<?php echo date('d-m-Y') ?>" size="15" maxlength="5" readonly="readonly" />  </td>
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
          <th width="30%" align="left" bgcolor="#00FFFF" scope="col">Pejabat  </th>
          <th width="15%" align="left" bgcolor="#00FFFF" scope="col">NIP </th>
          <th width="25%" align="center" bgcolor="#00FFFF" scope="col">Pangkat/Gol</th>
          <th width="30%" align="center" bgcolor="#00FFFF" scope="col">Jabatan</th>
          <th width="30%" align="left" bgcolor="#00FFFF" scope="col">Nama  </th>
          <th width="15%" align="left" bgcolor="#00FFFF" scope="col">Nim  </th>
          <th width="25%" align="center" bgcolor="#00FFFF" scope="col">Jurusan</th>
          <th width="25%" align="center" bgcolor="#00FFFF" scope="col">Tempat lahir</th>
          <th width="15%" align="center" bgcolor="#00FFFF" scope="col">Tgl lahir</th>
        </tr>
        
<?php
$no=1;
$surat= $_POST['nosurattxt'];
$nosurat ="B$kode/Uin.05/III.7/PP.00.9/$bulan/$tahun";
$sql1 = "select * from rincian_surat inner join mahasiswa on rincian_surat.nim_mahasiswa = mahasiswa.nm_mahasiswa where rincian_surat.no_surat ='$surat'";
$proses1 = mysqli_query($koneksi,$sql1);
while ($record1 = mysqli_fetch_array($proses1))
{
?>   
     
     	<tr>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $no ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['pejabat'] ?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['nip']?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['status']?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['jabatan']?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['nm_mahasiswa'] ?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['nim_mahasiswa']?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['jurusan']?></td>
    	<td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['tmp_lahir']?></td>
      <td align="center" scope="col" bgcolor="#FFFFFF"><?php echo $record1['tgl_lahir']?></td>
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
