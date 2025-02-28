<?php
ob_start();
require_once "../inc/function.php";

$id_pengguna   = htmlspecialchars($_POST['kode']);
$nama_png = htmlspecialchars($_POST['nama_png']);
$jenkel      = htmlspecialchars($_POST['jenkel']);
$email    = htmlspecialchars($_POST['email']);
$telepon    = htmlspecialchars($_POST['telepon']);
$role       = stripslashes($_POST['id_tipe']);
$password    = mysqli_real_escape_string($KONEKSI, $_POST['password']);
$password2       = mysqli_real_escape_string($KONEKSI, $_POST['password2']);

$target = '../images/pengguna/';

// $GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkap data file
// var_dump($_POST);
// var_dump($_FILES);
//die;

if ($id_pengguna == "" || $nama_png == "" || $jenkel == "" || $email == "" || $telepon == ""|| $password == "" || $password2 == "") {

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
    if (tambah_pengguna($_POST, $_FILES, $target) > 0) {
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
        <meta http-equiv="refresh" content="0.5; url=index.php?pages=user_pengguna">
<?php
        echo "<br>";
        echo mysqli_error($KONEKSI);
    }
}
?>
<meta http-equiv="refresh" content="0.5; url=index.php?pages=user_pengguna">