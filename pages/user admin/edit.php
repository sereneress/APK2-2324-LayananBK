<?php
$id = $_GET['id'];
//require_once "../inc/function.php";
//mencari tipe role
$sql_tipe_user = "SELECT id_tipe_user FROM tbl_tipe_user WHERE tipe_user = 'Admin'";
$hasil = mysqli_query($KONEKSI, $sql_tipe_user);
$row = mysqli_fetch_assoc($hasil);

//mencari data berdasarkan id yang dikirim oleh form edit
$sql = "SELECT tbl_admin.*, tbl_users.*FROM tbl_admin 
LEFT JOIN tbl_users ON tbl_admin.id_user = tbl_users.id_user WHERE tbl_admin.id_user='$id' ";

$edit = mysqli_query($KONEKSI, $sql);
while ($row = mysqli_fetch_assoc($edit)) {
    $id_user = $row['id_user'];
    $nama = $row['nama_admin'];
    $email = $row['email'];
    $telp = $row['telepon_admin'];
    $foto = $row['path_photo_admin'];
    $role = $row['id_tipe'];
}

?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Form Edit Data</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Admin</a></li>
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
                        <label for="InputIdAdmin">ID Admin</label>
                        <input type="text" class="form-control" id="InputIdAdmin" name="id_admin" value="<?php echo $id; ?>" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputNamaAdmin">Nama Admin</label>
                        <input type="text" class="form-control" id="InputNamaAdmin" name="nama_admin" value="<?php echo $nama; ?>" placeholder="Nama Lengkap Admin">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <input type="hidden" name="role" value="<?php echo $row['id_tipe_user']; ?>" id="role">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputEmail4">Email</label>
                        <input type="email" class="form-control" id="InputEmail4" name="email" value="<?php echo $email; ?>" placeholder="Your Email" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputTelepon">Telepon</label>
                        <input type="number" class="form-control" id="InputTelepon" name="telepon" value="<?php echo $telp; ?>" placeholder="Your Number">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <input type="hidden" name="photo_db" value="<?php echo $foto; ?>">
                        <img src="../images/users/<?php echo $foto; ?>" width="100px">
                        <input type="file" id="input-file-max-fs" name="Photo" class="dropify" data-default-file="../images/users/value=<?php echo $foto; ?>" data-max-file-size="2M" />
                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Upload Picture</p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <p class="mt-3 text-black">Ganti Password??
                            <a href="../inc/forgot.php" class="">Ganti Password </a>User Admin !!
                        </p>
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