
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
$view = mysqli_query($koneksi,"select * from surat_penelitian order by id desc");
$record = mysqli_fetch_array($view);
$kode = $record['id']+1;

$bulan = Date("m");
$tahun = Date("Y");
?>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <th width="660" align="left" valign="middle" bgcolor="#9D0000" scope="col"><font color="#FFFFFF" face="Goudy Old Style" size="4"><center><b>SURAT KETERANGAN PENELITIAN</b></th>
  <th width="40" align="right" bgcolor="#9D0000" scope="col"><a href="cetak.php?no_surat=<?php echo $record['no_surat_kp']; ?>"><img src="../../images/cetak.png" /></tr>

</tr>
</table>
<form id="form1" name="form1" method="post" action="simpan_rincian_skt.php?no_surat=<?php echo $record['no_surat_kp']; ?>">
  <table width="700" border="0" align="center">
      <tr>
      <td width="14%" align="left" valign="middle">No Surat</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="top"><input name="nosurattxt" type="text" id="nosurattxt" value="<?php echo $record['no_surat_kp']; ?>" size="30" maxlength="50" /></td>
    </tr>
  <tr>
    <td width="14%" align="left" valign="middle">Nip</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><input name="niptxt" type="text" value="<?php echo $record['nip']; ?>" id="niptxt" size="30" maxlength="50" />
    </td>
      <td align="left" valign="middle">Yang Menyetujui </td>
      <td align="left" valign="middle">:</td>
      <td width="left" valign="top"><input name="pejabattxt" value="<?php echo $record['pejabat']; ?>" type="text" id="pejabattxt" size="30" maxlength="50" /></td>
   
    </tr>
      <tr>
      <td width="14%" align="left" valign="middle">Tujuan</td>
      <td width="1%" align="left" valign="middle">:</td>
      <td width="41%" align="left" valign="middle"><input name="tujuantxt" value="<?php echo $record['tujuan']; ?>" type="text" id="tujuantxt" size="30" maxlength="50" /></td>

      <td align="left" valign="middle">Tahun Akademik</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="akademiktxt" value="<?php echo $record['akademik']; ?>" type="text" id="akademiktxt" size="30"> 
  </tr>
      
    <tr>
      <td align="left" valign="middle">Nim</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nimtxt" type="text" id="nimtxt" size="30" value="<?php echo $record['nim']; ?>" maxlength="50" /></td>
       <td align="left" valign="middle">Nama</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="mhstxt" value="<?php echo $record['nm_mhs']; ?>" type="text" id="mhstxt" size="30" maxlength="50" /></td>
     
    </tr>
    <tr>
      <td align="left" valign="middle">Judul Penelitian</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="judultxt" value="<?php echo $record['judul']; ?>" type="text" id="judultxt" size="30" /></td>
       <td align="left" valign="middle">Pembimbing I</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top">
        <select name="dospem1txt" >
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
      <td align="left" valign="top"><input name="semestertxt" type="text" id="semestertxt" value="<?php echo $record['semester']; ?>" size="30" maxlength="50" /></td>
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
      <td align="left" valign="middle">Tanggal Surat</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="tglskp" type="text" id="tglskp" value="<?php echo $record['tgl_skp']; ?>" size="6" readonly="readonly" /> 
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
