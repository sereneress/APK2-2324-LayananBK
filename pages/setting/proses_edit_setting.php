<?php
ob_start();
require_once "../inc/function.php";

//variable $ dan name yg ada di from
$nama_sekolah = htmlspecialchars($_POST['nama_sekolah']);
$alamat_sekolah = htmlspecialchars($_POST['alamat_sekolah']);
$email_sekolah = htmlspecialchars($_POST['email_sekolah']);
$telepon_sekolah = htmlspecialchars($_POST['telepon_sekolah']);
$kota = htmlspecialchars($_POST['kota']);
$kecamatan = htmlspecialchars($_POST['kecamatan']);
$provinsi = htmlspecialchars($_POST['provinsi']); 
$foto = htmlspecialchars($_POST['Photo']); 

// $GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkap data file
// var_dump($_POST);
// var_dump($_FILES);
//die;
//$GAMBAR = $_FILES['Photo']['tmp_name']; //untuk menangkup data file

if ($nama_sekolah == "" || $alamat_sekolah = "" || $email_sekolah = "" || $telepon_sekolah = "" || $kota = "" || $kecamatan = "" || $provinsi = "" || $foto = "") {
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
        if (edit_setting($_POST)> 0) {
            echo "<script>alert('Data di perbaharui');
            document.location.href = 'index.php?pages=setting'
            </script>";
        }
    
    else {
        echo "<script>alert('Data gagal di perbaharui');
        document.location.href = 'index.php?pages=setting'
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
<meta http-equiv="refresh" content="0.5; url=index.php?pages=setting">