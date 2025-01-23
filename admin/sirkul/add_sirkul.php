<?php
include "inc/koneksi.php";

$carikode = mysqli_query($koneksi, "SELECT id_sk FROM tb_sirkulasi ORDER BY id_sk DESC LIMIT 1");
if ($datakode = mysqli_fetch_array($carikode)) {
    $kode = $datakode['id_sk'];
    $urut = substr($kode, 1, 3);
    $tambah = (int) $urut + 1;

    if (strlen($tambah) == 1) {
        $format = "S" . "00" . $tambah;
    } else if (strlen($tambah) == 2) {
        $format = "S" . "0" . $tambah;
    } else if (strlen($tambah) == 3) {
        $format = "S" . $tambah;
    }
} else {
    $format = "S001"; 
}
?>

<section class="content-header">
    <h1>Peminjaman <small>Buku</small></h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>Si Perpustakaan</b>
            </a>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Peminjaman</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-remove"></i>
                        </button>
                    </div>
                </div>
               
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Id Peminjaman</label>
                            <input type="text" name="id_sk" id="id_sk" class="form-control" value="<?php echo $format; ?>" readonly />
                        </div>

                        <div class="form-group">
                            <label>Nama Peminjam</label>
                            <select name="NIM" id="NIM" class="form-control select2" style="width: 100%;">
                                <option selected="selected">-- Pilih --</option>
                                <?php
                                $query = "SELECT * FROM tb_anggota";
                                $hasil = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($hasil)) {
                                ?>
                                <option value="<?php echo $row['NIM'] ?>">
                                    <?php echo $row['NIM'] ?>
                                    - <?php echo $row['nama'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Buku</label>
                            <select name="id_buku" id="id_buku" class="form-control select2" style="width: 100%;">
                                <option selected="selected">-- Pilih --</option>
                                <?php
                                $query = "SELECT * FROM tb_buku";
                                $hasil = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_array($hasil)) {
                                ?>
                                <option value="<?php echo $row['id_buku'] ?>">
                                    <?php echo $row['id_buku'] ?>
                                    - <?php echo $row['judul_buku'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tgl Pinjam</label>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" />
                        </div>

                    </div>

                    <div class="box-footer">
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                        <a href="?page=data_sirkul" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['Simpan'])) {
    $id_sk = $_POST['id_sk'];
    $id_buku = $_POST['id_buku'];
    $NIM = $_POST['NIM'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = date('Y-m-d', strtotime('+7 days', strtotime($tgl_pinjam)));
    $tgl_dikembalikan = date('Y-m-d');

    // Query untuk menyimpan ke tabel tb_sirkulasi
    $sql1 = "INSERT INTO tb_sirkulasi (id_sk, id_buku, NIM, tgl_pinjam, status, tgl_kembali) 
             VALUES ('$id_sk', '$id_buku', '$NIM', '$tgl_pinjam', 'PIN', '$tgl_kembali')";

    // Query untuk menyimpan ke tabel log_pinjam
    $sql2 = "INSERT INTO log_pinjam (id_buku, NIM, tgl_pinjam) 
             VALUES ('$id_buku', '$NIM', '$tgl_pinjam')";

    // Eksekusi query
    $query1 = mysqli_query($koneksi, $sql1);
    $query2 = mysqli_query($koneksi, $sql2);

    if ($query1 && $query2) {
        echo "<script>
        Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_sirkul';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Tambah Data Gagal', text: 'Error: ".mysqli_error($koneksi)."', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=add_sirkul';
            }
        })</script>";
    }
    mysqli_close($koneksi);
}
?>
