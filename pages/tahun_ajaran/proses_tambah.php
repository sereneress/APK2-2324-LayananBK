<?php
ob_start();
require_once "../inc/function.php";

$nama   =stripslashes($_POST ['nama']);
$mulai = stripslashes($_POST['mulai']);
$selesai = stripslashes($_POST['selesai']);
// $GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkap data file
// var_dump($_POST);
// var_dump($_FILES);
//die;

if ($selesai =="" || !$selesai =="0000-00-00") {
    $status = "Active";
}else {
    $status = "Inactive";
}


if ($nama == "" || $mulai = "" || $selesai = "") {
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
    if (tambah_TA($_POST) > 0) {
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
        <meta http-equiv="refresh" content="0.5; url=index.php?pages=tahun_ajaran">
<?php
        echo "<br>";
        echo mysqli_error($KONEKSI);
    }
}
?>
<meta http-equiv="refresh" content="0.5; url=index.php?pages=tahun_ajaran">
