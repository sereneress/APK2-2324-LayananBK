<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">User Admin</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Tables</a></li>
                        <li><a href="?pages=user_admin">Admin</a></li>
                        <li class="active">Tampil Admin</li>
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
            <h1 class="card-header"> User Admin</h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <div class="add_button">
                            <a href="?pages=user_admin&aksi=tambah" class="btn btn-space btn-primary">Tambah Biasa</a>
                            <button type="button" class="btn btn-space btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Modals
                            </button>
                            <a href="?pages=user&aksi=print" class="btn btn-space btn-primary">Print</a>
                        </div>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT `tbl_admin`.*, `tbl_users`.*, `tbl_tipe_user`.*FROM `tbl_admin` LEFT JOIN `tbl_users` ON `tbl_admin`.`id_user` = `tbl_users`.`id_user` LEFT JOIN `tbl_tipe_user` ON `tbl_users`.`id_user` = `tbl_tipe_user`.`id_tipe_user`";
                            $tampil = tampil($sql);
                            $no = 1;
                            foreach ($tampil as $user) :
                            ?>
                                <tr>
                                    <td><?= $user['id_user']; ?></td>
                                    <td><a class="product-list-img" href="javascript: void(0)" ;><img src="../images/users/<?= $user['path_photo_admin'];  ?>" alt="User" width="100px"></td>
                                    <td><?= $user['nama_admin'];  ?></td>
                                    <td><?= $user['email'];  ?></td>
                                    <td><?= $user['telepon_admin'];  ?></td>
                                    <td class="">
                                        <details>
                                            <summary>⋮</summary>
                                            <a href="?pages=user_admin&aksi=view&id=<?php echo $user['id_user']; ?>">View</a><br>
                                            <a href="?pages=user_admin&aksi=edit&id=<?php echo $user['id_user']; ?>">Edit</a><br>
                                            <a href="#">Edit Modal</a><br>
                                            <a href="?pages=user_admin&aksi=hapus&id=<?php echo $user['id_user']; ?>">Delete</a><br>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>