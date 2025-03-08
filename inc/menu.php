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
        include '../pages/setting/setting.php';
        break;

    case 'dashboard':
        include '../pages/master/dashboard.php';
        break;

    case 'user_perhotelan1':
        include '../pages/siswa/perhotelan1/user_perhotelan1.php';
        break;

    case 'user_perhotelan2':
        include '../pages/siswa/perhotelan2/user_perhotelan2.php';
        break;

    case 'user_kuliner1':
        include '../pages/siswa/kuliner1/user_kuliner1.php';
        break;

    case 'user_kuliner2':
        include '../pages/siswa/kuliner2/user_kuliner2.php';
        break;

    case 'user_tkj1':
        include '../pages/siswa/TKJ1/user_tkj1.php';
        break;

    case 'user_tkj2':
        include '../pages/siswa/TKJ2/user_tkj2.php';
        break;

    case 'user_rpl':
        include '../pages/siswa/RPL/user_rpl.php';
        break;

    case 'user_tsm':
        include '../pages/siswa/TSM/user_tsm.php';
        break;

    case 'user_akl':
        include '../pages/siswa/akuntansi/user_akl.php';
        break;

    case 'user_farm':
        include '../pages/siswa/farmasi/user_farm.php';
        break;

    case 'user_otkp':
        include '../pages/siswa/perkantoran/user_otkp.php';
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
