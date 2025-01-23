<?php
    include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets_style/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css>">
		<title>Laporan Perpustakaan - Data Anggota</title>
	</head>
	<body onload="window.print()" style="font-family: Quicksand, sans-serif;">
    <h3 class='text-center' style='font-family: Quicksand, sans-serif; margin-top: 30px;'>
        .:: Laporan Perpustakaan ::.
    </h3>
    <h4 class='text-center'>Data Anggota</h4>
    <?php
    include "inc/koneksi.php";
 

        $query = "SELECT * from tb_anggota"; 
    
    ?>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
        <th  style="text-align: center;">No</th>
      <th  style="text-align: center;">NIM</th>      
      <th  style="text-align: center;">Nama</th>
      <th  style="text-align: center;">Jenis Kelamin</th>
      <th  style="text-align: center;">Angkatan</th>
      <th  style="text-align: center;">No Telepon</th>
    </tr>
    <?php
    $no=1;
    ?>
        <?php
        $sql = mysqli_query($koneksi, $query); 
        $row = mysqli_num_rows($sql); 

        if ($row > 0) { 
            while ($data = mysqli_fetch_array($sql)) {
                $tgl = date('d-m-Y', strtotime($data['NIM']));

                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $data['NIM'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['jekel']. "</td>";
                echo "<td>" . $data['Angkatan'] . "</td>";
                echo "<td>" . $data['no_hp'] . "</td>";

                echo "</tr>";
            }
        } else { 
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
        ?>
    </table>
		<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
		document.body.innerHTML = originalContents;
	}
	
  </script>
  </body>
  
</html>

