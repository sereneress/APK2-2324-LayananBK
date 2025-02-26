<?php
ob_start();
require_once "../inc/function.php";

$id_admin   =stripslashes($_POST ['id_admin']);
$nama_admin = stripslashes($_POST['nama_admin']);
$email      = strtolower(stripslashes($_POST['email']));
$telepon    = stripslashes($_POST['telepon']);
$role       = stripslashes($_POST['role']);
$password   = mysqli_real_escape_string($KONEKSI, $_POST['password']);
$password2  = mysqli_real_escape_string($KONEKSI, $_POST['password2']);

// $GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkap data file
// var_dump($_POST);
// var_dump($_FILES);
//die;

if ($id_admin == "" || $nama_admin = "" || $email = "" || $telepon = "" || $role = "" || $password = "" || $password2 = "") {
?>
    <div>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">WARNINGG !!</h4>
            <p>LENGKAPI DATA BERIKUT!!</p>
            <hr>
        </div>
    </div>

    <?php
} else {
    if (tambah_admin($_POST) > 0) {
    ?>
        <div>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">SELESAI !!</h4>
                <p>DATA LENGKAP!! </p>
                <hr>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">WARNING !!</h4>
                <p>LENGKAPI DATA !!</p>
                <hr>
            </div>
        </div>
        <meta http-equiv="refresh" content="0.5; url=index.php?pages=user_admin">
<?php
        echo "<br>";
        echo mysqli_error($KONEKSI);
    }
}
?>
<meta http-equiv="refresh" content="0.5; url=index.php?pages=user_admin">
