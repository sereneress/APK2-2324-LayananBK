<?php
ob_start();
require_once "../inc/function.php";

$nama = stripcslashes($_POST['nama']);
$mulai = stripcslashes($_POST['mulai']);
$selesai = stripcslashes($_POST['selesai']);
$status = $_POST['status'] ?? "Inactive";

if ($nama == "" || $mulai == "" || $selesai == "") {
?>
    <div class="alert alert-danger alert-dismissible text-white bg-danger alert-label-icon fade show" role="alert">
        <i class="ri-error-warning-line label-icon"></i><strong>Gagal!</strong> Harap isi semua data yang wajib diisi.
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
} else {
    if ($status === "Active") {
        mysqli_query($KONEKSI, "UPDATE tbl_tahun_ajaran SET status_tahun ='Inactive' WHERE status_tahun ='Active'");
    }

    $data = [
        'nama' => $nama,
        'mulai' => $mulai,
        'selesai' => $selesai,
        'status' => $status
    ];

    $result = tambah_TA($data);

    if ($result > 0) {
        echo "<script>alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php?pages=tahun_ajaran'</script>";
    } elseif ($result == -1) {
        echo "<script>alert('Data gagal ditambahkan! Tahun ajaran sudah ada.');
        document.location.href = 'index.php?pages=tahun_ajaran&aksi=tambah'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan karena kesalahan sistem.');
        document.location.href = 'index.php?pages=tahun_ajaran&aksi=tambah'</script>";
        echo "<br>";
        echo mysqli_error($KONEKSI);
    }
}
?>