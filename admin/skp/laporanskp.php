<?php
session_start();
if ($_SESSION['username'] = $username)
{
$koneksi=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("skp",$koneksi);
$query=mysql_query("select * from admin where username='$username'",$koneksi);
$row=mysql_fetch_array($query);
}
else
header("location:bukan_member.php");
?><style type="text/css">
div.ui-datepicker{
 font-size:12px;
}
</style> 

<link href="JQuery/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet">

<script src="JQuery/jquery-1.9.1.js"></script>
<script src="JQuery/jquery-ui-1.10.3.custom.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
				
	$("#tglmulai").datepicker({
      showOn: "both", buttonImage: "images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"});
	  
	$("#tglsampai").datepicker({
	showOn: "both", buttonImage: "images/calendar.png", buttonImageOnly: true, changeMonth: true, changeYear: true, dateFormat: "dd-mm-yy"}); 
	})
	
</script>

<form name="form1" method="post" action="laporan_cetak.php">
<br><table width="700" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="4"><center><b>LAPORAN SURAT KETERANGAN PENELITIAN</b></th>
</tr>
</table><br>
  <table width="350" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td width="109" scope="col">Penelitian</td>
      <td width="8" scope="col">:</td>
      <td width="213" scope="col"><input name="tglskp" type="text" id="tglskp" value="<?php echo date('d-m-Y') ?>" size="6" maxlength="10" readonly /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Prosesbtn" id="Prosesbtn" value="Proses"></td>
    </tr>
  </table>
</form>
