<?php
require_once "../inc/function.php";
$id = $_GET['id'];
$sql = "SELECT tbl_pengguna.*, tbl_users.*FROM tbl_pengguna 
LEFT JOIN tbl_users ON tbl_pengguna.id_user = tbl_users.id_user WHERE tbl_pengguna.id_user='$id' ";
$query = mysqli_query($KONEKSI, $sql) or die("Gagal melakukan querry" . mysqli_error($KONEKSI));
$row =  mysqli_fetch_assoc($query);

?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Hapus User</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Tables</a></li>
                        <li><a href="?pages=user_pengguna">Pengguna</a></li>
                        <li class="active"> Hapus Pengguna</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div id="modalSizes" class="mb-2 col-md-12"><br>
                <h3>Hapus Data Pengguna</h3>
                <hr>
                <h5><b>Apakah Anda Yakin Ingin Menghapus Data <span style="color:brown font-weight:bold"><?php echo $row['nama_pengguna'];  ?></span></b></h5>
                <div class="card-body">
                    <a href="?pages=user_pengguna&aksi=proses_hapus&id=<?php echo $row['id_user'];  ?>" class="btn btn-primary" name="Hapus">Hapus Data </a>
                    <a href="?pages=user_pengguna" type="reset" class="btn btn-danger" name="Hapus">Cancel</a>

                </div>
            </div>
            <div class="hljs-container">
                <pre><code class="xml" data-url="assets/data/ui-modal-notification/code-2.json"></code></pre>
            </div>
        </div>
    </div>
</div>

</div>
</div>