<?php
$id = $_GET['id'] ?? '';
require_once "../inc/function.php";

// Ambil data dari database berdasarkan id
$sql = "SELECT * FROM tbl_tahun_ajaran WHERE id_TA='$id'";
$edit = mysqli_query($KONEKSI, $sql);
$row = mysqli_fetch_assoc($edit);

$nama = $row['nama_TA'] ?? '';
$mulai = $row['tgl_mulai'] ?? '';
$selesai = $row['tgl_akhir'] ?? '';
$status = $row['status_tahun'] ?? '';
?>

<div class="row">
    <div class="col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Form Edit Tahun Ajaran</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tahun Ajaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php
// Tangani form submit
if (isset($_POST['editdata'])) {
    include "proses_edit.php";
}
?>

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Form Edit</h5>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <input type="hidden" name="kode" value="<?= $id; ?>">

                <!-- Tahun Ajaran -->
                <div class="mb-3">
                    <label for="InputTahunAjaran">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="InputTahunAjaran" name="nama"
                        value="<?= $nama; ?>" required>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <!-- Status Tahun -->
                <div class="mb-3">
                    <label for="InputStatus" class="d-block">Status Tahun</label>
                    <div class="d-flex align-items-center gap-3">
                        <div class="switch-button switch-button-xs">
                            <input type="checkbox" name="status" id="InputStatus"
                                value="Active" <?= $status === 'Active' ? 'checked' : ''; ?>>
                            <span><label for="InputStatus"></label></span>
                        </div>
                        <span id="statusLabel" class="fw-bold <?= $status === 'Active' ? 'text-success' : 'text-secondary'; ?>">
                            <?= $status === 'Active' ? 'Active' : 'Inactive'; ?>
                        </span>
                    </div>
                </div>

                <!-- Tanggal Mulai -->
                <div class="mb-3">
                    <label for="InputTanggalMulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="InputTanggalMulai" name="mulai"
                        value="<?= $mulai; ?>" required>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <!-- Tanggal Selesai -->
                <div class="mb-3">
                    <label for="InputTanggalSelesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="InputTanggalSelesai" name="selesai"
                        value="<?= $selesai; ?>" required>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <!-- Tombol -->
                <div class="mt-4">
                    <button type="submit" name="editdata" class="btn btn-primary">Edit Data</button>
                    <input type="reset" class="btn btn-success" value="Reset">
                    <a href="index.php?pages=tahun_ajaran" class="btn btn-secondary ms-1">Cancel</a>
                </div>
            </form>

            <!-- Script untuk switch status -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const toggle = document.getElementById('InputStatus');
                    const label = document.getElementById('statusLabel');

                    function updateLabel() {
                        if (toggle.checked) {
                            label.textContent = 'Active';
                            label.classList.remove('text-secondary');
                            label.classList.add('text-success');
                        } else {
                            label.textContent = 'Inactive';
                            label.classList.remove('text-success');
                            label.classList.add('text-secondary');
                        }
                    }

                    updateLabel();
                    toggle.addEventListener('change', updateLabel);
                });
            </script>
        </div>
    </div>
</div>
