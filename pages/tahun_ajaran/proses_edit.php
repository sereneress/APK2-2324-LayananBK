<?php
ob_start();
require_once "../inc/function.php";

$nama = stripslashes($_POST['nama']);
$mulai = stripslashes($_POST['mulai']);
$selesai = stripslashes($_POST['selesai']);
$status = stripslashes($_POST['status']);

// $GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkap data file
// var_dump($_POST);
// var_dump($_FILES);
//die;
//$GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkup data file

if ($nama == "" || $mulai == "" || $selesai == "" || $status == "") {
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
        if (edit_TA($_POST)> 0) {
            echo "<script>alert('Data di tambahkan');
            document.location.href = 'index.php?pages=tahun_ajaran'
            </script>";
        } else {
        echo "<script>alert('Data gagal di tambahkan');
        document.location.href = 'index.php?pages=tahun_ajaran'
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
<meta http-equiv="refresh" content="0.5; url=index.php?pages=tahun_ajaran">