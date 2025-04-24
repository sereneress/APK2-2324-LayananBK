<?php
ob_start();
require_once "../inc/function.php";

// Ambil data dari form
$kode   = $_POST['kode'] ?? '';
$nama   = stripslashes(trim($_POST['nama'] ?? ''));
$start  = $_POST['mulai'] ?? '';
$end    = $_POST['selesai'] ?? '';
$status = isset($_POST['status']) && $_POST['status'] === 'Active' ? 'Active' : 'Inactive';

// Validasi input wajib
if (empty($kode) || empty($nama) || empty($start) || empty($end)) {
?>
    <div class="alert alert-danger alert-dismissible text-white bg-danger alert-label-icon fade show" role="alert">
        <i class="ri-error-warning-line label-icon"></i><strong>Gagal!</strong> Harap isi semua data yang wajib diisi.
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    return;
}

// Data untuk update
$data = [
    'id'     => $kode,
    'nama'   => $nama,
    'mulai'  => $start,
    'selesai'=> $end,
    'status' => $status
];

// Eksekusi update
if (edit_TA($data) > 0) {
    echo "<script>
        alert('Data berhasil diupdate!');
        window.location.href = 'index.php?pages=tahun_ajaran';
    </script>";
} else {
    echo "<script>
        alert('Gagal update data!');
        window.location.href = 'index.php?pages=tahun_ajaran';
    </script>";
}
?>