<?php
ob_start();
require_once "../inc/function.php"; // Pastikan file ini benar dan terkoneksi ke database

// Koneksi ke database
global $KONEKSI;

// Ambil ID sekolah
$id_sekolah = intval($_POST['kode']); // Pastikan ID sekolah berupa angka

// Ambil foto lama dari input hidden
$foto_lama = isset($_POST['photo_db']) ? stripslashes($_POST['photo_db']) : '';
$target = '../images/setting/';

// Cek apakah ada file baru yang diunggah
if (!isset($_FILES['Photo']) || $_FILES['Photo']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "<script>alert('Tidak ada file yang diunggah.');</script>";
} else {
    // Proses update logo
    $foto_baru = edit_logo($_POST, $_FILES, $target);



    if ($foto_baru !== false) {
        $tgl = date("Y-m-d H:i:s"); // Waktu update terbaru

        // Query UPDATE database
        $query = "UPDATE tbl_setting SET path_logo_sekolah = ?, update_at = ? WHERE id_sekolah = ?";
        $stmt = mysqli_prepare($KONEKSI, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $foto_baru, $tgl, $id_sekolah);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Data berhasil diperbarui!');</script>";
            } else {
                echo "<script>alert('Gagal memperbarui database: " . mysqli_error($KONEKSI) . "');</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Query tidak valid: " . mysqli_error($KONEKSI) . "');</script>";
        }

        echo "<script>document.location.href = 'index.php?pages=setting';</script>";
    } else {
        echo "<script>alert('Data gagal diperbarui!'); document.location.href = 'index.php?pages=setting';</script>";
    }
}
?>
