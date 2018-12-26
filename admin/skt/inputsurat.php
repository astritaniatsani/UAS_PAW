
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
    
  $("#tglskt").datepicker({
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
$view = mysqli_query($koneksi,"select * from surat_tahfidz order by id desc");
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
      <td align="left" valign="middle">Nip</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="niptxt" type="text" id="niptxt"  size="30" maxlength="50" /></td>
      <td align="left" valign="middle">Yang Menandatangani</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="pejabattxt" type="text" id="pejabattxt"  size="30" maxlength="50" readonly="readonly"/></td>
    </tr>
     <tr>
      <td align="left" valign="middle">Nim</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nimtxt" type="text" id="nimtxt"  size="30" maxlength="50" /></td>
      <td align="left" valign="middle">Nama</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="mhstxt" type="text" id="mhstxt"  size="30" maxlength="50" readonly="readonly"/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Nilai</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nilaitxt" type="text" id="nilaitxt" size="30" maxlength="50"/></td>
      <td align="left" valign="middle">Tgl Surat</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglskt" type="text" id="tglskt" value="<?php echo date('d-m-Y') ?>" size="30" maxlength="5" readonly="readonly" />  </td>
    </tr>
    <tr>
      <td align="left" valign="middle">Jurusan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="jurusantxt" type="text" id="jurusantxt" size="30" maxlength="50"/></td>
    </tr>


   
      </table></td>
    </tr>
   <tr>
    <div class="form-group"> 
  <div class="col-sm-offset-2 col-sm-10"></div></div>
      <div class="col-sm-offset-2"> 
    <button type="submit" name="submitbtn" class="btn btn-default w3ls-button">Submit</button> 
  </div> 
    </tr>
  </table>
</form>
