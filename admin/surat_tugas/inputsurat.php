
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
		
	$("#tglsap").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});		
	$("#tglawal").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});
	  $("#tglakhir").datepicker({
      showOn: "both", buttonImage: "../../images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});
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
include '../../koneksi.php';
$view = mysqli_query($koneksi,"select * from surat_tugas order by id desc");
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
	</tr>
      <td align="left" valign="middle">Yang Memberi Tugas</td>
      <td align="left" valign="middle">:</td>
      <td colspan="4" align="left" valign="top"><select name="pejabat">
	  <?php include "koneksi.php";
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
      <td width="14%" align="left" valign="middle">Yang Diberi Tugas</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><select name="kepada">
	  <?php include "koneksi.php";	
		$tampil = mysqli_query($koneksi,"select * from dosen order by nm_dosen asc");
		while($data = mysqli_fetch_array($tampil))
		{
			echo'<option value="'.$data['nm_dosen'].'">'.$data['nm_dosen'].'</option>';
		}
		?>
		</select>
		</td>
    <tr>
      <td align="left" valign="middle">Tanggal</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglawal" type="text" id="tglawal" value="<?php echo date('d-m-Y') ?>" size="6" readonly="readonly" /> 
	  Sampai
	  <input name="tglakhir" type="text" id="tglakhir" value="<?php echo date('d-m-Y') ?>" size="6" readonly="readonly" /></td>
      
    </tr>
    <tr>
      <td align="left" valign="middle">Tgl SAP</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglsap" type="text" id="tglsap" value="<?php echo date('d-m-Y') ?>" size="6" readonly="readonly" /></td>     
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
