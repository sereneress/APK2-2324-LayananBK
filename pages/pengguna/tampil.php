<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">User | Pengguna</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="?index.php" class="breadcrumb-link">Tables</a></li>
                        <li><a href="?pages=user_pengguna">Pengguna</a></li>
                        <li class="active">Tampil Pengguna</li>
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
            <h1 class="card-header"> User | Pengguna </h1>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenkel</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = tampil("SELECT tbl_pengguna.*, tbl_users.* FROM tbl_pengguna 
                            LEFT JOIN tbl_users ON tbl_pengguna.id_user = tbl_users.id_user");
                            $tampil = $sql;
                            $no = 1;
                            foreach ($tampil as $user) :
                            ?>
                                <tr>
                                    <td><?= $user['id_user']; ?></td>
                                    <td><a class="product-list-img" href="javascript: void(0)" ;><img src="../images/pengguna/<?= $user['path_photo_pengguna'];  ?>" alt="User" width="100px"></td>
                                    <td><?= $user['nama_pengguna'];  ?></td>
                                    <td><?= $user['email'];  ?></td>
                                    <td>
							            <?php if ($user['jenkel'] == 'L') {
                                                    echo 'Laki-Laki';
                                                } elseif ($user['jenkel'] == 'P') {
                                                    echo 'Perempuan';
                                                }
                                        ?>
						            </td>
                                    <td><?= $user['telepon_pengguna'];  ?></td>
                                    <td class="">
                                        <details>
                                            <summary>⋮</summary>
                                            <a href="?pages=user_pengguna&aksi=view&id=<?php echo $user['id_user']; ?>">View</a><br>
                                            <a href="?pages=user_pengguna&aksi=edit&id=<?php echo $user['id_user']; ?>">Edit</a><br>
                                            <a href="#">Edit Modal</a><br>
                                            <a href="?pages=user_pengguna&aksi=hapus&id=<?php echo $user['id_user']; ?>">Delete</a><br>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenkel</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>




                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah User Admin</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Nama Lengkap Admin</label>
                                            <input id="inputText3" type="text" class="form-control" placeholder="Masukan Nama Lengkap">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control">
                                            <p>We'll never share your email with anyone else.</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input id="inputPassword" type="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Confirm Password</label>
                                            <input id="inputPassword" type="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputTelepon">isi no telp</label>
                                            <input id="inputTelepon" type="telepon" placeholder="nomor telepon anda" class="form-control">
                                        </div>
                                        <div class="profile-image mb-3 col-md-4"><img src="#" class="rounded-circle" alt="">
                                            <img src="../assets/images/s-1.jpg" width="100px">
                                            <input type="file" id="input-file-max-fs" class="dropify mt-2">
                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Reset Data</a>
                                    <a href="#" class="btn btn-primary">Tambahkan Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
</div>