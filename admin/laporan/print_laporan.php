<?php
    include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets_style/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <title>Laporan Perpustakaan</title>
</head>
<body onload="window.print()" style="font-family: Quicksand, sans-serif;">
    <h3 class='text-center' style='font-family: Quicksand, sans-serif; margin-top: 30px;'>.:: Laporan Perpustakaan ::.</h3>
    <h4 class='text-center'>Laporan Denda</h4>

    <?php
    include "inc/koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT 
        tb_sirkulasi.id_buku, 
        tb_buku.judul_buku, 
        tb_anggota.NIM,
        tb_anggota.nama,
        tb_sirkulasi.id_sk,
        tb_sirkulasi.tgl_pinjam,
        tb_sirkulasi.tgl_kembali,
        IF(DATEDIFF(NOW(), tb_sirkulasi.tgl_kembali) <= 0, 0, DATEDIFF(NOW(), tb_sirkulasi.tgl_kembali)) AS telat_pengembalian 
        FROM tb_sirkulasi 
        JOIN tb_anggota ON tb_anggota.NIM = tb_sirkulasi.NIM 
        JOIN tb_buku ON tb_buku.id_buku = tb_sirkulasi.id_buku 
        WHERE tb_sirkulasi.status = 'KEM'
        ORDER BY NIM");

    $no = null;
    $total_denda = null;
    $tarif_denda = 1000;
    ?>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">ID Peminjaman</th>
                <th style="text-align: center;">Buku</th>
                <th style="text-align: center;">Peminjam</th>
                <th style="text-align: center;">Tgl Pinjam</th>
                <th style="text-align: center;">Jatuh Tempo</th>
                <th style="text-align: center;">Denda</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $row = mysqli_num_rows($sql); 

            if ($row > 0) { 
                while ($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)) { 
                    $no++;
                    $total_denda = $total_denda + ($data['telat_pengembalian'] * $tarif_denda);
                    echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . $data['id_sk'] . '</td>
                        <td>' . $data['judul_buku'] . '</td>
                        <td>' . $data['nama'] . '</td>
                        <td>' . date('d/M/Y', strtotime($data['tgl_pinjam'])) . '</td>
                        <td>' . date('d/M/Y', strtotime($data['tgl_kembali'])) . '</td>
                        <td>Rp. ' . number_format($data['telat_pengembalian'] * $tarif_denda, 0, ',', '.') . '</td>
                    </tr>';
                }
            } else { 
                echo "<tr><td colspan='7'>Data tidak ada</td></tr>";
            }
            ?>
            <tr>
                <th colspan="7" style="text-align:right; padding-right:1.5cm;">
                    Total Denda Rp. <?php echo number_format($total_denda, 0, ',', '.'); ?>
                </th>
            </tr>
        </tbody>
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
