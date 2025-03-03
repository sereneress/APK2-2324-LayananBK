<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Menejemen Perkantoran</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Tables</a></li>
                        <li class="active">Tampil Siswa Menejemen Perkantoran</li>
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

    <!-- TAMPIL X Menejemen Perkantoran  -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card"> 
            <h1 class="card-header"> X-Menejemen Perkantoran</h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <div class="add_button">
                            <a href="?pages=user_pengguna&aksi=tambah" class="btn btn-space btn-primary">Tambah Biasa</a>
                            <button type="button" class="btn btn-space btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Modals
                            </button>
                            <a href="?pages=user&aksi=print" class="btn btn-space btn-primary">Print</a>
                        </div>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Telepon</th>
                                <th>Point Siswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = tampil("SELECT tbl_siswa.*, tbl_users.* FROM tbl_siswa 
                            LEFT JOIN tbl_users ON tbl_siswa.id_user = tbl_users.id_user");
                            $tampil = $sql;
                            $no = 1;
                            foreach ($tampil as $user) :
                            ?>
                                <tr>
                                    <td><?= $user['id_user']; ?></td>
                                    <td><a class="product-list-img" href="javascript: void(0)" ;><img src="../images/petugas/<?= $user['path_photo_petugas'];  ?>" alt="User" width="100px"></td>
                                    <td><?= $user['nama_petugas'];  ?></td>
                                    <td><?= $user['telepon_petugas'];  ?></td>
                                    <td class="">
                                        <details>
                                            <summary>⋮</summary>
                                            <a href="?pages=user_petugas&aksi=view&id=<?php echo $user['id_user']; ?>">View</a><br>
                                            <a href="?pages=user_petugas&aksi=edit&id=<?php echo $user['id_user']; ?>">Edit</a><br>
                                            <a href="#">Edit Modal</a><br>
                                            <a href="?pages=user_petugas&aksi=hapus&id=<?php echo $user['id_user']; ?>">Delete</a><br>
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
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Telepon</th>
                                <th>Point Siswa</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ENDD TAMPIL X Menejemen Perkantoran  -->


    <!-- TAMPIL XI Menejemen Perkantoran  -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card"> 
            <h1 class="card-header"> XI-Menejemen Perkantoran</h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <div class="add_button">
                            <a href="?pages=user_pengguna&aksi=tambah" class="btn btn-space btn-primary">Tambah Biasa</a>
                            <button type="button" class="btn btn-space btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Modals
                            </button>
                            <a href="?pages=user&aksi=print" class="btn btn-space btn-primary">Print</a>
                        </div>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Telepon</th>
                                <th>Point Siswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = tampil("SELECT tbl_siswa.*, tbl_users.* FROM tbl_siswa 
                            LEFT JOIN tbl_users ON tbl_siswa.id_user = tbl_users.id_user");
                            $tampil = $sql;
                            $no = 1;
                            foreach ($tampil as $user) :
                            ?>
                                <tr>
                                    <td><?= $user['id_user']; ?></td>
                                    <td><a class="product-list-img" href="javascript: void(0)" ;><img src="../images/petugas/<?= $user['path_photo_petugas'];  ?>" alt="User" width="100px"></td>
                                    <td><?= $user['nama_petugas'];  ?></td>
                                    <td><?= $user['telepon_petugas'];  ?></td>
                                    <td class="">
                                        <details>
                                            <summary>⋮</summary>
                                            <a href="?pages=user_petugas&aksi=view&id=<?php echo $user['id_user']; ?>">View</a><br>
                                            <a href="?pages=user_petugas&aksi=edit&id=<?php echo $user['id_user']; ?>">Edit</a><br>
                                            <a href="#">Edit Modal</a><br>
                                            <a href="?pages=user_petugas&aksi=hapus&id=<?php echo $user['id_user']; ?>">Delete</a><br>
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
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Telepon</th>
                                <th>Point Siswa</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ENDD TAMPIL XI Menejemen Perkantoran  -->

    <!-- TAMPIL XII Menejemen Perkantoran  -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card"> 
            <h1 class="card-header"> XII-Menejemen Perkantoran</h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <div class="add_button">
                            <a href="?pages=user_pengguna&aksi=tambah" class="btn btn-space btn-primary">Tambah Biasa</a>
                            <button type="button" class="btn btn-space btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Modals
                            </button>
                            <a href="?pages=user&aksi=print" class="btn btn-space btn-primary">Print</a>
                        </div>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Telepon</th>
                                <th>Point Siswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = tampil("SELECT tbl_siswa.*, tbl_users.* FROM tbl_siswa 
                            LEFT JOIN tbl_users ON tbl_siswa.id_user = tbl_users.id_user");
                            $tampil = $sql;
                            $no = 1;
                            foreach ($tampil as $user) :
                            ?>
                                <tr>
                                    <td><?= $user['id_user']; ?></td>
                                    <td><a class="product-list-img" href="javascript: void(0)" ;><img src="../images/petugas/<?= $user['path_photo_petugas'];  ?>" alt="User" width="100px"></td>
                                    <td><?= $user['nama_petugas'];  ?></td>
                                    <td><?= $user['telepon_petugas'];  ?></td>
                                    <td class="">
                                        <details>
                                            <summary>⋮</summary>
                                            <a href="?pages=user_petugas&aksi=view&id=<?php echo $user['id_user']; ?>">View</a><br>
                                            <a href="?pages=user_petugas&aksi=edit&id=<?php echo $user['id_user']; ?>">Edit</a><br>
                                            <a href="#">Edit Modal</a><br>
                                            <a href="?pages=user_petugas&aksi=hapus&id=<?php echo $user['id_user']; ?>">Delete</a><br>
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
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Telepon</th>
                                <th>Point Siswa</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ENDD TAMPIL XII Menejemen Perkantoran  -->


















    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
</div>