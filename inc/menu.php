<?php
@$pages = $_GET['pages'];
switch ($pages) {
    case 'tampil':
        include '../pages/master/tampil.php';
        break;

    case 'tambah':
        include '../pages/master/tambah.php';
        break;

    case 'profile':
        include '../pages/master/profile.php';
        break;

    case 'invoice':
        include '../pages/master/invoice.php';
        break;

    case 'setting':
        include '../pages/master/setting.php';
        break;

    case 'dashboard':
        include '../pages/master/dashboard.php';
        break;

    case 'user_admin':
        include '../pages/user admin/user_admin.php';
        break;

    case 'user_pengguna':
        include '../pages/pengguna/user_pengguna.php';
        break;

    case 'user_siswa':
        include '../pages/siswa/user_siswa.php';
        break;

    default:
        include '../pages/master/dashboard.php';
        break;
}
