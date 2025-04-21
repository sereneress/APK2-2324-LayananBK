<?php
$id = $_GET['id'];
//require_once "../inc/function.php";
//mencari tipe role
// $sql_tipe_user = "SELECT id_tipe_user FROM tbl_tipe_user WHERE tipe_user = 'Admin'";
// $hasil = mysqli_query($KONEKSI, $sql_tipe_user);
// $row = mysqli_fetch_assoc($hasil);

//mencari data berdasarkan id yang dikirim oleh form edit
$sql = "SELECT tbl_jurusan .* FROM tbl_jurusan WHERE kode_jurusan='$id'";

$edit = mysqli_query($KONEKSI, $sql);
while ($row = mysqli_fetch_assoc($edit)) {
    $kode_jurusan = $row['kode_jurusan'];
    $nama_jurusan = $row['nama_jurusan'];
}



?>



<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Form Edit Jurusan</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Jurusan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['editdata'])) {
    include "proses_edit.php";
}
?>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Form Tambah</h5>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="InputKodejurusan">Kode Jurusan</label>
                                        <input type="text" class="form-control" id="InputKodejurusan" name="kode" value="<?= $id; ?>" readonly>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                                        <label for="InputNamajurusan">Nama Jurusan</label>
                                        <input type="text" class="form-control" id="InputNamajurusan" name="nama_jur" value="<?= $nama_jurusan; ?>" placeholder="jurusan Anda">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-3"><br>
                                    <input type="submit" class="btn btn-primary" name="editdata" value="Edit Data">
                                    <input type="reset" class="btn btn-danger" name="Hapus" value="Reset">
                                    <a href="index.php?pages=admin" class="btn btn-warning">Cencel</a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                </div>