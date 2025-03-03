<?php
ob_start();
require_once "../inc/function.php";

$id_pengguna   = stripslashes($_POST['kode']);
$nama_pengguna = stripslashes($_POST['nama_png']);
$jenkel      = stripslashes($_POST['jenkel']);
$email_pengguna    = stripslashes($_POST['email']);
$telepon_pengguna    = stripslashes($_POST['telepon']);
$foto_lama  = stripslashes($_POST['photo_db']);


$target = '../images/pengguna/';

//kiri variable, kanan dari name form edit.php

// $GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkap data file
// var_dump($_POST);
// var_dump($_FILES);
//die;
//$GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkup data file

// echo $id_pengguna.' | '.$nama_pengguna.' | | '.$jenkel.' | '.$email_pengguna.' | '.$telepon_pengguna.' | '.$cabang.' | '.$password.' | '.$foto_lama;
// die;
if ($id_pengguna == "" || $nama_pengguna = "" || $jenkel = "" || $email_pengguna = ""  || $telepon_pengguna = "" || $foto_lama = "" ) {
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
    if (isset($foto_lama)) {
        var_dump($_FILES['Photo']);
        if (edit_pengguna($_POST, $target, $_FILES)> 0) {
            echo "<script>alert('Data di tambahkan');
            document.location.href = 'index.php?pages=user_pengguna'
            </script>";
        }
    
    } else {
        echo "<script>alert('Data gagal di tambahkan');
        document.location.href = 'index.php?pages=user_pengguna'
        </script>"; 
        echo "<br>";
        echo mysqli_error($KONEKSI);
    }

?>
        <div>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">SELESAI !!</h4>
                <p>DATA LENGKAP!! </p>
                <hr>
            </div>
        </div>
    
<?php
}
?>
<meta http-equiv="refresh" con98tent="0.5; url=index.php?pages=user_pengguna">