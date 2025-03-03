<?php
$id = $_GET['id'];
//require_once "../inc/function.php";
//mencari tipe role
$sql_tipe_user = "SELECT id_tipe_user FROM tbl_tipe_user WHERE tipe_user = 'Pengguna'";
$hasil = mysqli_query($KONEKSI, $sql_tipe_user);
$row = mysqli_fetch_assoc($hasil);

//mencari data berdasarkan id yang dikirim oleh form edit
$sql = "SELECT tbl_pengguna.*, tbl_users.*FROM tbl_pengguna 
LEFT JOIN tbl_users ON tbl_pengguna.id_user = tbl_users.id_user WHERE tbl_pengguna.id_user='$id' ";

$edit = mysqli_query($KONEKSI, $sql);
while ($row = mysqli_fetch_assoc($edit)) {
    $id_pengguna = $row['id_pengguna'];
    $nama_pengguna = $row['nama_pengguna'];
    $telepon_pengguna = $row['telepon_pengguna'];
    $jenkel = $row['jenkel'];
    $foto = $row['path_photo_pengguna'];
    $id_user = $row['id_user'];
    $email = $row['email'];
    $role = $row['id_tipe'];
}
//kiri variable kanan filed database



?>



<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Form Edit Data</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">pengguna</a></li>
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
        <h5 class="card-header">Form Edit Data</h5>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="InputIdBranch">ID pengguna</label>
                        <input type="text" class="form-control" id="InputIdBranch" name="kode" value="<?php echo $id; ?>" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputNamaCabang">Nama pengguna</label>
                        <input type="text" class="form-control" id="InputNamaPengguna" name="nama_png" value="<?php echo $nama_pengguna; ?>" placeholder="Nama pengguna"><br>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="col-sm-6">
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-checkbox">
                                    <input id="InputJenkel" name="jenkel" type="radio" data-parsley-multiple="groups" <?php if ($jenkel == 'L') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> value="L" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input">
                                    <span class="custom-control-label">Laki - Laki</span>
                                </label>
                                <label class="custom-control custom-checkbox">
                                    <input id="InputJenkel" name="jenkel" type="radio" data-parsley-multiple="groups" <?php if ($jenkel == 'P') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> value="P" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input">
                                    <span class="custom-control-label">Perempuan</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="InputEmail4">Email</label>
                        <input type="email" class="form-control" id="InputEmail4" name="email" value="<?php echo $email; ?>" readonly>
                        <input type="hidden" class="form-control" id="InputIdBranch" name="role" value="<?php echo $row['id_tipe_user'] ?>" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputTelepon">Telepon</label>
                        <input type="number" class="form-control" id="InputTelepon" name="telepon" value="<?php echo $telepon_pengguna; ?>" placeholder="Telepon">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <input type="hidden" name="photo_db" value="<?php echo $foto; ?>">
                        <img src="../images/pengguna/<?php echo $foto; ?>" width="100px">
                        <input type="file" id="input-file-max-fs" name="Photo" class="dropify" data-default-file="../images/pengguna/value=<?php echo $foto; ?>" data-max-file-size="2M" />
                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Upload Picture</p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br> 
                        <p class="mt-3 text-black">Ganti Password??
                            <a href="../inc/forgot.php" class="">Ganti Password </a>User pengguna !!
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-3"><br>
                        <input type="submit" class="btn btn-primary" name="editdata" value="Edit Data">
                        <input type="reset" class="btn btn-danger" name="Hapus" value="Reset">
                        <a href="index.php?pages=branch" class="btn btn-warning">Cencel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>