<?php
include "koneksi.php";

$query = "select * from admin where username='$username'";
$hasil = mysql_query($query, $koneksi) or die("Gagal melakukan query.");
$data = mysql_fetch_array($hasil);
mysql_close($koneksi);
?>
<html>
<title>SISTM : Sitem Informasi Surat Tugas Fakultas Sains dan Teknologi</title>
</head>
<body>
<table width="93%" border="0">
                
                  <tr>
                 
		
		
		
                    <td width="53%" rowspan=5><center><img src="images/user.png" width="291" height="345"></td>
                    <td width="21%"><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>Id User</b></td>
                    <td width="3%"><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>:</b></td>
                    <td width="23%"><font face="Georgia, Times New Roman, Times, serif" size="+0"><?php echo $data['id'];?>
                    </td>
                  </tr>
                  <tr>
                  <td width="21%"><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>User</b></td>
                    <td width="3%"><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>:</b></td>
                    <td width="23%"><font face="Georgia, Times New Roman, Times, serif" size="+0"><?php echo $data['username'];?></td>
                  </tr>
                  <tr>
                  
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>Nama Lengkap</b></td>
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>:</b></td>
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"><?php echo $data['nama'];?></td>
        
                  </tr>
                   
                   <tr>
                  
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>Keterangan</b></td>
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>:</b></td>
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"><?php echo $data['keterangan'];?></td>
        
                  </tr>
                  <tr>
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>Waktu Akses </b></td>
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"><b>:</b></td>
                    <td><font face="Georgia, Times New Roman, Times, serif" size="+0"> <?php
$tgl =date("l, d F Y H:i:s");

print"$tgl";
?></td>
</tr>

</table>

</body>
</html>
                    