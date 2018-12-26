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
    
  $("#tgllahir").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});   
  $("#tglskl").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});
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
include '../../koneksi.php';
$view = mysqli_query($koneksi,"select * from surat_lulus order by id desc");
$record = mysqli_fetch_array($view);
$kode = $record['id']+1;
$bulan = Date("m");
$tahun = Date("Y");
// TAMPILKAN DATA BARANG DAN HARGA
?>
<form id="form1" name="form1" method="post" action="pemesanan_simpan.php" enctype="multipart/form-data">
  <table width="700" border="0" align="center">
     <tr>
      <td width="14%" align="left" valign="middle">No Surat</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="nosurattxt" type="text" id="nosurattxt" value="<?php echo "B/Uin.05/III.7/PP.00.9/$bulan/$tahun" ?>" size="30" maxlength="50" /></td>   
    </tr>
    <tr>
     <td width="left" align="left" valign="middle">NIP</td>
      <td width="left" align="left" valign="middle">:</td>
      <td width="left" align="left" valign="middle"><input name="niptxt" type="text" id="niptxt" maxlength="100" size="30" /></td>
      <td align="left" valign="middle">Pejabat</td>
      <td align="left" valign="middle">:</td>
      <td colspan="left" align="left" valign="top"><input name="pejabattxt"  type="text" id="pejabattxt" size="30" />
      </td>
      
    </tr>
    <tr>
      <td align="left" valign="middle">Pangkat/Gol</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="pangkattxt" type="text" id="pangkattxt" size="30"  maxlength="50" /></td>
      <td align="left" valign="middle">Jabatan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="jabatantxt" type="text" id="jabatantxt" size="30"   maxlength="50" /></td>
    </tr>    
    <tr>
      <td align="left" valign="middle">Nim</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nimtxt" type="text" id="nimtxt" size="30" /></td>
  
      <td width="left" align="left" valign="middle">Nama</td>
      <td width="left" align="left" valign="middle">:</td>
      <td width="left" align="left" valign="middle"><input name="mhstxt" type="text" id="mhstxt" size="30" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Jurusan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="jurusantxt" type="text" id="jurusantxt" size="30" maxlength="50" readonly="readonly"/></td>
      <td align="left" valign="middle">IPK</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="ipktxt" type="text" id="ipktxt" size="30" maxlength="50" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tempat, Tgl Lahir </td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tmp_lahirtxt" type="text" id="tmp_lahirtxt" size="30" maxlength="50" /></td>
      <td align="left" valign="middle">Akademik</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="akademiktxt" type="text" id="akademiktxt" size="30" maxlength="50" /></td>
   
     
    </tr>
    <tr>
      <td align="left" valign="middle">Tgl Lulus</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglskl" type="text" id="tglskl" value="<?php echo date('d-m-Y') ?>" size="15" maxlength="5" readonly="readonly" />  </td>
       <td align="left" valign="middle">Tgl Lahir</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tgllahir" type="text" id="tgllahir" value="<?php echo date('d-m-Y') ?>" size="15" maxlength="5" readonly="readonly" />  </td>
    </tr>
      </table></td>
    </tr>
   <tr>
    <div class="form-group"> 
  <div class="col-sm-offset-2 col-sm-10"></div></div>
      <div class="col-sm-offset-2"> 
    <button type="submit" name="submit" class="btn btn-default w3ls-button">Submit</button> 
  </div> 
    </tr>
  </table>
</form>
