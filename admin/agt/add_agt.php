<section class="content-header">
    <h1>
        Tambah Anggota
        <small>Data anggota</small>
    </h1>
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
                    <h3 class="box-title">Tambah anggota</h3>
                </div>
                
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="NIM" id="NIM" class="form-control" placeholder="Masukkan NIM">
                        </div>

                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Anggota">
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jekel" id="jekel" class="form-control" required>
                                <option>-- Pilih --</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Angkatan</label>
                            <input type="text" name="Angkatan" id="Angkatan" class="form-control" placeholder="Angkatan">
                        </div>

                        <div class="form-group">
                            <label>No HP</label>
                            <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No HP">
                        </div>

                    </div>

                    <div class="box-footer">
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                        <a href="?page=MyApp/data_agt" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
</section>

<?php

if (isset($_POST['Simpan'])) {
    $nim = $_POST['NIM'];
    $nama = $_POST['nama'];
    $jekel = $_POST['jekel'];
    $Angkatan = $_POST['Angkatan'];

    $no_hp = $_POST['no_hp'];

    if (!empty($nim) && !empty($nama) && !empty($jekel) && !empty($no_hp)) {
        $sql_simpan = "INSERT INTO tb_anggota (NIM, nama, jekel,Angkatan, no_hp) VALUES (
            '$nim',
            '$nama',

            '$jekel',
            '$Angkatan',
            '$no_hp'
        )";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

        if ($query_simpan) {
            echo "<script>
            Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=MyApp/data_agt';
                }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=MyApp/add_agt';
                }
            })</script>";
        }
    } else {
        echo "<script>
        Swal.fire({title: 'Semua field wajib diisi', text: '', icon: 'warning', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/add_agt';
            }
        })</script>";
    }
}
?>
