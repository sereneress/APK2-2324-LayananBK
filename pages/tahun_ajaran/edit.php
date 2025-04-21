<?php
$id = $_GET['id'];
//require_once "../inc/function.php";
//mencari tipe role
// $sql_tipe_user = "SELECT id_tipe_user FROM tbl_tipe_user WHERE tipe_user = 'Admin'";
// $hasil = mysqli_query($KONEKSI, $sql_tipe_user);
// $row = mysqli_fetch_assoc($hasil);

//mencari data berdasarkan id yang dikirim oleh form edit
$sql = "SELECT tbl_tahun_ajaran .* FROM tbl_tahun_ajaran WHERE nama_TA='$id'";

$edit = mysqli_query($KONEKSI, $sql);
while ($row = mysqli_fetch_assoc($edit)) {
    $nama = $row['nama_TA'];
    $mulai = $row['tgl_mulai'];
    $selesai = $row['tgl_akhir'];
    $status = $row['status_tahun'];
}



?>



<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Form Edit Tahun Ajaran</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tahun Ajaran</a></li>
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
        <h5 class="card-header">Form Edit</h5>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputTahunAjaran">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="InputTahunAjaran" name="nama" value="<?= $nama; ?>" readonly >
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br>
                        <label for="InputEmail4">Status Tahun Ajaran</label>
                        <div class="col-sm-6">
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-checkbox">
                                    <input id="InputStatus" name="status" type="checkbox" data-parsley-multiple="groups" <?php if ($status == 'Inactive') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> value="Inactive" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">Inactive</span>
                                </label>
                                <label class="custom-control custom-checkbox">
                                    <input id="InputStatus" name="status" type="checkbox" data-parsley-multiple="groups" <?php if ($status == 'Active') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> value="Active" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">Active</span>
                                </label>
                                <div id="error-container1"></div>
                            </div>
                        </div>
                    </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                            <label for="InputTanggalMulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="InputTanggalMulai" name="mulai" value="<?= $mulai; ?>" placeholder="Tanggal Mulai">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                            <label for="InputTanggalSelesai">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="InputTanggalSelesai" name="selesai" value="<?= $selesai; ?>" placeholder="Tanggal Selesai">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-3"><br>
                        <button type="submit" name="editdata" class="btn btn-primary">Edit Data</button>
                        <input type="reset" name="Hapus" class="btn btn-success" value="Reset">
                        <a href="index.php?pages=jurusan" class="btn btn-secondary ms-1">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>