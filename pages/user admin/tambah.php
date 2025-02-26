<?php
$sql_tipe_user = "SELECT id_tipe_user FROM tbl_tipe_user WHERE tipe_user = 'Admin'";
$hasil = mysqli_query($KONEKSI, $sql_tipe_user);
$row = mysqli_fetch_assoc($hasil);

?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Form Tambah Admin</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['tambahdata'])) {
    include "proses_tambah.php";
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
                        <input type="text" class="form-control" id="InputIdAdmin" name="id_admin" value="<?php echo autonumber("tbl_users", "id_user", 7, "ADM"); ?>" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputNamaAdmin">Nama Admin</label>
                        <input type="text" class="form-control" id="InputNamaAdmin" name="nama_admin" placeholder="Nama Lengkap Admin">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <input type="hidden" name="role" value="<?php echo $row['id_tipe_user']; ?>" id="role">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputEmail4">Email</label>
                        <input type="email" class="form-control" id="InputEmail4" name="email" placeholder="Your Email">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputTelepon">Telepon</label>
                        <input type="number" class="form-control" id="InputTelepon" name="telepon" placeholder="Your Number">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputPassword2">Confirm Your Password</label>
                        <input type="password" class="form-control" id="InputPassword2" name="password2" placeholder="Confirm Password">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="ExampleFromControlFile1">Photo User</label>
                        <input type="file" name="Photo" class="form-control-file form-control-file-rounded" id="ExampleFromControlFile1">
                    </div>
                </div>
                <div class="col-md-6 col-sm-3"><br>
                    <input type="submit" class="btn btn-primary" name="tambahdata" value="Tambah Data">
                    <input type="reset" class="btn btn-danger" name="Hapus" value="Reset">
                    <a href="index.php?pages=admin" class="btn btn-warning">Cencel</a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>