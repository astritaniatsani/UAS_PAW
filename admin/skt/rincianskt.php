
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

?>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th width="660" align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="4"><center><b>SURAT KETERANGAN TAHFIDZ</b></th>
  <th width="40" align="right" bgcolor="#9D0000" scope="col"><a href="cetak.php?no_surat=<?php echo $record['no_surat_tahfidz']; ?>"><img src="../../images/cetak.png" /></tr>

</tr>
</table>
<form id="form1" name="form1" method="post" action="simpan_rincian_skt.php?no_surat=<?php echo $record['no_surat_tahfidz']; ?>">
  <table width="700" border="0" align="center">
     <tr>
      <td width="14%" align="left" valign="middle">No Surat</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="nosurattxt" type="text" id="nosurattxt" value="<?php echo $record['no_surat_tahfidz']; ?>" size="30" maxlength="50" readonly="readonly" /></td>   
    </tr>
    <tr>
      <td align="left" valign="middle">Nip</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="niptxt" type="text" id="niptxt" value="<?php echo $record['nip']; ?>"  size="30" maxlength="50" /></td>
      <td align="left" valign="middle">Yang Menandatangani</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="pejabattxt" type="text" id="pejabattxt" value="<?php echo $record['pejabat']; ?>" size="30" maxlength="50" readonly="readonly"/></td>
    </tr>
     <tr>
      <td align="left" valign="middle">Nim</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nimtxt" value="<?php echo $record['nim']; ?>" type="text" id="nimtxt"  size="30" maxlength="50" /></td>
      <td align="left" valign="middle">Nama</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="mhstxt" type="text" value="<?php echo $record['nm_mhs']; ?>" id="mhstxt"  size="30" maxlength="50" readonly="readonly"/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Nilai</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nilaitxt" type="text" value="<?php echo $record['nilai']; ?>" id="nilaitxt" size="30" maxlength="50"/></td>
      <td align="left" valign="middle">Tgl Surat</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglskt" value="<?php echo $record['tanggal']; ?>" type="text" id="tglskt" value="<?php echo date('d-m-Y') ?>" size="30" maxlength="5" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Jurusan</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="jurusantxt" type="text" value="<?php echo $record['Jurusan']; ?>" id="jurusantxt" size="30" maxlength="50"/></td>
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
