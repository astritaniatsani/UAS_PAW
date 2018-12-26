
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
		
	
	$("#tglawal").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});
	  $("#tglakhir").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});
	function cari_menu(){
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
  
  $('#niptxt').change(function() {
    cari_menu();
    $("#jmltxt").focus()  
    });   
    
})    
</script>


<?php
include '../../koneksi.php';
$view = mysqli_query($koneksi,"select * from surat_kerja_praktik order by id desc");
$record = mysqli_fetch_array($view);
$kode = $record['id']+1;

$bulan = Date("m");
$tahun = Date("Y");

?>
<form id="form1" name="form1" method="post" action="pemesanan_simpan.php"   enctype="multipart/form-data">
  <table width="700" border="0" align="center">
      <tr>
      <td width="14%" align="left" valign="middle">No Surat</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="nosurattxt" type="text" id="nosurattxt" value="<?php echo "B/Uin.05/III.7/PP.00.9/$bulan/$tahun" ?>" size="30" maxlength="50" /></td>
    </tr>
    <tr>
      <td width="14%" align="left" valign="middle">Tujuan Kerja Praktik</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><input name="kepadatxt" type="text" id="kepadatxt" size="30" maxlength="100"/></td>
      
    </tr>
    </tr>
      <td align="left" valign="middle">Nip</td>
      <td align="left" valign="middle">:</td>
      <td colspan="4" align="left" valign="top"><input name="niptxt" type="text" id="niptxt" size="30" maxlength="100"/></td>
    </tr>
	</tr>
      <td align="left" valign="middle">Yang Menyetujui</td>
      <td align="left" valign="middle">:</td>
      <td colspan="4" align="left" valign="top"><input name="pejabattxt" type="text" id="pejabattxt" size="30" maxlength="100" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tanggal</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglawal" type="text" id="tglawal" value="<?php echo $record['tgl_awal_skkp']; ?>" size="9" maxlength="5" readonly="readonly" /> 
    Sampai <input name="tglakhir" value="<?php echo $record['tgl_slsai_skkp']; ?>" type="text" id="tglakhir"  size="9" maxlength="5" readonly="readonly" /></td>
    <td align="left" valign="middle">Akademik</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="akademiktxt" type="text" id="akademiktxt" size="30" maxlength="50" /></td>
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
