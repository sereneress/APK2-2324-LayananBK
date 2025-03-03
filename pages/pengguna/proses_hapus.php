<?php 
require_once "../inc/function.php";

$target ='../images/pengguna/';
//pastikan parameter id di ambil dari URL, bukan dari POST
//biasanya kita menggunakan POST kalau data dari form spt tambah edit, tp kalau delete id bukan post lebih baik menggunakan id array asositive

$data = ['id' => $_GET['id']];

//jadi, baris $data = ['id' => $_GET['id']]; membuat array asosiatif $data di mana:
//$data = ['id'] berisi nilai yang di ambil dari $_GET['id'], yakni nilai parameter id yang di kirim melalui URL.

//Hapus cabang dengan menggunakan data id yang di ambil dari URL
if (hapus_pengguna($data, $target)) {
    echo "<script>alert('Data Berhasil Di Hapus!!!')
        document.location.href='?pages=user_pengguna'
        </script>";
}else {
    echo "<script>alert('Data Tidak Berhasil Di Hapus!!!')
        document.location.href='?pages=user_pengguna'
        </script>";
        echo "<br>";
        echo mysqli_error($KONEKSI);
}

?>