<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Form Tambah Jurusan</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['tambahdata'])) {
                    include "proses_tambah.php";
                }
                ?>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Form Tambah</h5>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="InputKodeJurusan">Kode Jurusan</label>
                                        <input type="text" class="form-control" id="InputKodeJurusan" name="kode" value="<?php echo autonumber("tbl_jurusan", "kode_jurusan", 5, "JUR"); ?>" readonly>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                                        <label for="InputNamaJurusan">Nama Jurusan</label>
                                        <input type="text" class="form-control" id="InputNamaJurusan" name="nama_jur" placeholder="Jurusan">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-3"><br>
                                    <input type="submit" class="btn btn-primary" name="tambahdata" value="Tambah Data">
                                    <input type="reset" class="btn btn-danger" name="Hapus" value="Reset">
                                    <a href="index.php?pages=jurusan" class="btn btn-warning">Cencel</a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                </div>