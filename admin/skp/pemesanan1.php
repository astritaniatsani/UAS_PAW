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
    
  $("#tglskp").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});   
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
  var kode2=$("#nmjurusantxt").val();
        if(kode2!=""){
          $.ajax({
            type:"post",
            url:"cari_menu.php",
            data:"kode2="+kode2,
            success:function(data){
            $("#dosentxt").val(data)
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

$view = mysqli_query($koneksi,"select * from surat_penelitian order by id desc");
$record = mysqli_fetch_array($view);

$kode = $record['id']+1;
$bulan = Date("m");
$tahun = Date("Y");

?>
<table width="700" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
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
      <td align="left" valign="middle">Tujuan Penelitian</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tujuantxt" type="text" id="tujuantxt" size="30" value="<?php echo $_POST['tujuantxt']; ?>" maxlength="50" readonly="readonly"/></td>
    </tr>
    <tr>
      <td width="14%" align="left" valign="middle">Kepada</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><input name="tujuantxt" type="text" id="tujuantxt" size="30"value="<?php echo $_POST['tujuantxt']; ?>" maxlength="100" readonly="readonly"/></td>
      <td align="left" valign="middle">Judul</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="judultxt" type="text" id="judultxt" size="30" maxlength="100" /></td>
    </tr>
    <tr>
       <td align="left" valign="middle">Nama</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><select name="mhstxt">
        <?php  
        $tampil = mysqli_query($koneksi,"select * from mahasiswa order by nim asc");
        while($data = mysqli_fetch_array($tampil))
        {
          echo'<option value="'.$data['nama'].'">'.$data['nama'].'</option>';
        }
        ?>
        </select></td>
      <td align="left" valign="middle">Pembimbing I</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top">
        <select name="dospem1txt">
        <?php  
        $tampil = mysqli_query($koneksi,"select * from dosen order by nm_dosen asc");
        while($data = mysqli_fetch_array($tampil))
        {
          echo'<option value="'.$data['nm_dosen'].'">'.$data['nm_dosen'].'</option>';
        }
        ?>
        </select>
    </td>
    </tr>
    <tr>
      <td align="left" valign="middle">Semester</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="semestertxt" type="text" id="semestertxt" size="30" maxlength="50" /></td>
      <td align="left" valign="middle">Pembimbing II</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top">
         <select name="dospem2txt">
    <?php  
    $tampil = mysqli_query($koneksi,"select * from dosen order by nm_dosen asc");
    while($data = mysqli_fetch_array($tampil))
    {
      echo'<option value="'.$data['nm_dosen'].'">'.$data['nm_dosen'].'</option>';
    }
    ?>
    </select>
      </td>
   
    </tr>
    <tr>

      <td align="left" valign="middle">Tahun Akademik</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="akademiktxt" type="text" id="akademiktxt"  size="20" maxlength="10"/>  </td>
      <td width="14%" align="left" valign="middle">Tanggal Penelitian</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="tglskp" type="text" id="tglskp" value="<?php echo $_POST['tglskp']; ?>" size="30" maxlength="50" readonly="readonly"  /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Pejabat</td>
      <td align="left" valign="middle">:</td>
      <td colspan="4" align="left" valign="top"><input name="pejabattxt" value="<?php echo $_POST['pejabattxt']; ?>" type="text" id="pejabattxt" size="20" />
    </td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td colspan="4" align="left" valign="top"><input type="submit" name="tambahbtn" id="tambahbtn" value="Tambah" />
      <input type="submit" name="prosesbtn" id="prosesbtn" value=" Proses " /></td>
    </tr>

      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td colspan="4" align="left" valign="top"></td>
    </tr>
  </table>
</form>
