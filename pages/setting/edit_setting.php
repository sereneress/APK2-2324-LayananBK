<?php
//require_once "../inc/function.php";

//mencari data berdasarkan id yang dikirim oleh form edit
$sql = "SELECT * FROM `tbl_setting` WHERE 1";

$edit = mysqli_query($KONEKSI, $sql);
while ($row = mysqli_fetch_assoc($edit)) {
    $nama_sekolah = $row['nama_sekolah'];
    $alamat_sekolah = $row['alamat_sekolah'];
    $email_sekolah = $row['email_sekolah'];
    $telepon_sekolah = $row['telepon_sekolah'];
    $kota = $row['kota'];
    $kecamatan = $row['kecamatan'];
    $provinsi = $row['provinsi'];
    $foto = $row['path_logo_sekolah'];
}
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Form Setting</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">forms</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">layout</a></li>
                        <li class="breadcrumb-item active" aria-current="page">default</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['editdata'])) {
    include "proses_edit_setting.php";
}
?>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Data Sekolah</h5>
        <div class="card-body">
            <!-- Tambahkan action dan method -->
            <form class="needs-validation" method="POST">  
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="InputNamaSekolah">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" value="<?php echo $nama_sekolah; ?>" class="form-control" id="InputNamaSekolah" placeholder="Nama Sekolah" required><br>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="InputAlamatSekolah">Alamat Sekolah</label>
                        <input type="text" name="alamat_sekolah" value="<?php echo $alamat_sekolah; ?>" class="form-control" id="InputAlamatSekolah" placeholder="Alamat Sekolah" required><br>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="InputTeleponSekolah">Telephone Sekolah</label>
                        <div class="input-group">
                            <input type="text" name="telepon_sekolah" value="<?php echo $telepon_sekolah; ?>" class="form-control" id="InputTeleponSekolah" placeholder="Kontak Sekolah" required><br>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                        <label for="InputEmailSekolah">Email Sekolah</label>
                        <div class="input-group">
                            <input type="text" name="email_sekolah" value="<?php echo $email_sekolah; ?>" class="form-control" id="InputEmailSekolah" placeholder="Email Sekolah" required><br>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="InputKota">Kota</label>
                        <input type="text" name="kota" value="<?php echo $kota; ?>" class="form-control" id="InputKota" placeholder="Kota" required><br>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="InputKecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" value="<?php echo $kecamatan; ?>" class="form-control" id="InputKecamatan" placeholder="Kecamatan" required><br>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="InputProvinsi">Provinsi</label>
                        <input type="text" name="provinsi" value="<?php echo $provinsi; ?>" class="form-control" id="InputProvinsi" placeholder="Provinsi" required><br>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLogo">Logo Sekolah</label><br>
                    <img src="../images/setting/<?php echo $foto; ?>" width="100px">
                    <input type="hidden" name="photo_db" value="0">
                    <input type="file" class="form-control mt-2" id="inputLogo" name="Photo" required><br>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" name="editdata" class="btn btn-primary mb-4 mt-3">Perbaharui Data Sekolah</button>
                </div>
            </form>
        </div>
    </div>
</div>