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
    
  $(document).ready(function(){
    
  $("#tglskt").datepicker({
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
      if(kode2!=""){
        $.ajax({
          type:"post",
          url:"cari_menu.php",
          data:"kode1="+kode4,
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
            data:"kode2="+kode5,
            success:function(data){
            $("#dosentxt").val(data)
            }
          });


  var kode3=$("#niptxt").val();
      if(kode2!=""){
        $.ajax({
          type:"post",
          url:"cari_menu.php",
          data:"kode3="+kode2,
          success:function(data){
          $("#namatxt").val(data)
          }
        });

        }
  }
  
  $('#nimmahasiswatxt').change(function() {
    cari_menu();
    $("#jmltxt").focus()  
    });		
		
}	
}
</script>

<?php

$view = mysqli_query($koneksi,"select * from surat_tahfidz order by id desc");
$record = mysqli_fetch_array($view);

$kode = $record['id']+1;
$bulan = Date("m");
$tahun = Date("Y");

?>
<br><table width="700" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="4"><center><b>SURAT KETERANGAN TAHFIDZ</b></th>
</tr>
</table><br>
<form id="form1" name="form1" method="post" action="pemesanan_simpan.php">
  <table width="700" border="0" align="center">
      <tr>
      <td width="14%" align="left" valign="middle">No Surat</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="nosurattxt" type="text" id="nosurattxt" value="<?php echo $_POST['nosurattxt']; ?>" size="30" maxlength="50" readonly="readonly"  /></td>
    <tr>
      <td align="left" valign="middle">Nama</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="mhstxt" type="text" id="mhstxt" value="<?php echo $_POST['mhstxt']; ?>" size="30" maxlength="50" readonly="readonly"/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Nilai</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nilaitxt" type="text" id="nilaitxt" size="30" maxlength="50"/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tgl Lulus</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglskt" type="text" id="tglskt" value="<?php echo $_POST['tglskt']; ?>" size="6" maxlength="5" readonly="readonly" />  </td>
    </tr>
    <tr>
      <td align="left" valign="middle">Yang Menandatangani</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="pejabattxt" type="text" id="pejabattxt" value="<?php echo $_POST['pejabattxt']; ?>" size="30" maxlength="50" readonly="readonly"/></td>
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
          <th width="30%" align="left" bgcolor="#00FFFF" scope="col">Nama  </th>
          <th width="15%" align="left" bgcolor="#00FFFF" scope="col">Nim  </th>
          <th width="25%" align="center" bgcolor="#00FFFF" scope="col">Jurusan</th>
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
