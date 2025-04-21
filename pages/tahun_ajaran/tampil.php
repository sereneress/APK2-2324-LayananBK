<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Tahun Ajaran</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Tables</a></li>
                        <li><a href="?pages=tahun_ajaran">Tahun Ajaran</a></li>
                        <li class="active">Tampil Tahun Ajaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h1 class="card-header"> Tahun Ajaran </h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <div class="add_button">
                            <a href="?pages=tahun_ajaran&aksi=tambah" class="btn btn-space btn-primary">Tambah Biasa</a>
                            <button type="button" class="btn btn-space btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Modals
                            </button>
                            <a href="?pages=user&aksi=print" class="btn btn-space btn-primary">Print</a>
                        </div>
                        <thead>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = tampil("SELECT tbl_tahun_ajaran .* FROM tbl_tahun_ajaran ");
                            $tampil = $sql;
                            $no = 1;
                            foreach ($tampil as $user) :
                            ?>
                                <tr>
                                    <td><?= $user['nama_TA']; ?></td>
                                    <td><?= $user['tgl_mulai']; ?></td>
                                    <td><?= $user['tgl_akhir']; ?></td>
                                    <td><?= $user['status_tahun']; ?></td>
                                    <td class="">
                                        <details>
                                            <summary>⋮</summary>
                                            <a href="?pages=tahun_ajaran&aksi=view&id=<?php echo $user['nama_TA']; ?>">View</a><br>
                                            <a href="?pages=tahun_ajaran&aksi=edit&id=<?php echo $user['nama_TA']; ?>">Edit</a><br>
                                            <a href="#">Edit Modal</a><br>
                                            <a href="?pages=tahun_ajaran&aksi=hapus&id=<?php echo $user['nama_TA']; ?>">Delete</a><br>
                                        </details>
                                    </td>
                                <?php
                                $no++;
                            endforeach;
                                ?>
                                </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
</div>