<?php
ob_start();
require_once "../inc/function.php";

$id_admin   = stripslashes($_POST['id_admin']);
$nama_admin = stripslashes($_POST['nama_admin']);
$email      = stripslashes($_POST['email']);
$telepon    = stripslashes($_POST['telepon']);
$foto_lama  = stripslashes($_POST['photo_db']);

// $GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkap data file
// var_dump($_POST);
// var_dump($_FILES);
//die;
//$GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkup data file

if ($id_admin == "" || $nama_admin = "" || $email = "" || $telepon = "") {
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
        if (edit_admin($_POST)> 0) {
            echo "<script>alert('Data di tambahkan');
            document.location.href = 'index.php?pages=user_admin'
            </script>";
        }
    
    } else {
        echo "<script>alert('Data gagal di tambahkan');
        document.location.href = 'index.php?pages=user_admin'
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
<meta http-equiv="refresh" content="0.5; url=index.php?pages=user_admin">