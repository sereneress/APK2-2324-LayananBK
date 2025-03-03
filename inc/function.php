<?php 
//set waktu
date_default_timezone_set('Asia/Jakarta');
$tgl = date('y-m-d H:i:s');

//Koneksi Data Base
$HOASTNAME = "localhost";
$DATABASE = "db_layanan_bk";
$USERNAME = "root";
$PASSWORD = "";

$KONEKSI = mysqli_connect($HOASTNAME, $USERNAME, $PASSWORD, $DATABASE);

if (!$KONEKSI) {
    die("koneksi errorr coba lagii..!!!" . mysqli_connect_error($KONEKSI));
}

//fungsi Autonumber

function autonumber($tabel, $kolom, $lebar = 0, $awalan)
{
    global $KONEKSI;

    $auto = mysqli_query($KONEKSI, "SELECT $kolom FROM 
    $tabel ORDER BY $kolom desc limit 1") or die(mysqli_error($KONEKSI));
    $jumlah_record = mysqli_num_rows($auto);

    
    if ($jumlah_record == 0) {
        $nomor = 1;
    } else {
        $row = mysqli_fetch_array($auto);
        $nomor = intval(substr($row[0], strlen($awalan))) + 1;
    }
    if ($lebar > 0) {
        $angka = $awalan . str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
    } else {
        $angka = $awalan . $nomor;
    }
    return $angka;
}
//echo autonumber("tbl_users", "id_user",3,"USR");

//Fungsi Register
function registrasi($data)
{
    global $KONEKSI;
    global $tgl;

    $id_user = stripslashes($data['id_user']);
    $nama = stripslashes($data['nama']); //untuk cek form register dari input name:"nama" di file register
    $email = strtolower(stripslashes($data['email'])); //memastikan form register mengirim input email berupa huruf kecil semua
    $password = mysqli_real_escape_string($KONEKSI, $data['password']);
    $password2 = mysqli_real_escape_string($KONEKSI, $data['password2']);

    //echo $nama."|" .$email."|".$password."|".$password2;

    //cek email yg di input ada belum di database
    $result = mysqli_query($KONEKSI, "SELECT email from tbl_users WHERE email='$email'");
    //var_dump($result);

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Email Yang Di input Sudah Ada Di Database!!!');
        </script>";
        return false;
    }

    //Cek Konfirmasi Password
    if ($password !== $password2) {
        echo "<script>
        alert('Konfirmasi Password Tidak Sesuai!!!');
        document.location.href='register.php';
        </script>";
        return false;
    }

    //Enkripsi password yang akan kita masuk ke database
    $password_hash = password_hash($password, PASSWORD_DEFAULT); //menggunakan algoritma default dari hash
    //var_dump($password_hash);

    //ambil id_tipe_user yang ada di tabel tbl_tipe_user
    $tipe_user = "SELECT * FROM tbl_tipe_user WHERE tipe_user='Admin' ";
    $hasil = mysqli_query($KONEKSI, $tipe_user);
    $row = mysqli_fetch_assoc($hasil);
    $id = $row['id_tipe_user'];

    //Tambahkan user baru ke tbl_users
    $sql_users = "INSERT INTO tbl_users SET 
    id_user = '$id_user',
    id_tipe = '$id',
    email = '$email',
    password = '$password_hash',
    create_at = '$tgl'";

    mysqli_query($KONEKSI, $sql_users) or die("Gagal Menambahkan User" . mysqli_error($KONEKSI));

    //Tambahkan user baru ke tbl_admin
    $sql_admin = "INSERT INTO tbl_admin SET 
    id_user = '$id_user',
    nama_admin = '$nama',
    create_at = '$tgl'";

    mysqli_query($KONEKSI, $sql_admin) or die("Gagal Menambahkan User" . mysqli_error($KONEKSI));


    echo "<script>
    document.location.href='login.php';
    </script>";

    return mysqli_affected_rows($KONEKSI);
}

//fungsi tampil data
function tampil($DATA)
{
    global $KONEKSI;

    $HASIL = mysqli_query($KONEKSI, $DATA);
    $data = []; //MEYIAPKAN VARIABLE/WADAH YG MASI KOSONG UNTUK NANTINYA AKAN KITA GUNAKAN UNTUK MENYIMPAN DATA YANG KITA QUERY/PANGGIL DARI DATA BASE
    while ($row = mysqli_fetch_assoc($HASIL)) {
    $data[] = $row;
    }
    return $data; // kita kembalikan nilainya, di munculkan 

}

//fungsi upload file menggunakan parameter (NEW)
function upload_file_new($data, $file, $target)
{
    //inisialisasi elemen dari foto/filenya
    $namaFile = $file['Photo']['name'];
    $ukuranFile = $file['Photo']['size'];
    $error = $file['Photo']['error'];
    $tmpName = $file['Photo']['tmp_name'];
    $tipeFile = $file['Photo']['type'];

    $kode   = htmlspecialchars($data['kode']);

    //debug buat element $data dan $file

    echo "<pre>";
    print_r($data);  //melihat data yang akan di terima
    print_r($file);  //melihat data yang akan di terima
    echo "</pre>";

    //pastikan bahwa user melakukan upload file

    if ($error == UPLOAD_ERR_NO_FILE) {
        echo "<script>alert('Tidak ada file yang di upload!!');
        </script>";
        return false;
    }

    //validasi ekstenssi file
    $ekstensiValid = ['jpg', 'jpeg', 'bmp', 'png'];
    $ekstensiFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (! in_array($ekstensiFile, $ekstensiValid)) {
        echo "<script>alert('file yang anda upload bukan gambar!!');
        </script>";
        return false;
    }

    //Validasi ukuran gambar
    if ($ukuranFile > 1 * 1024 * 1024) {
        echo "<script>alert('ukuran file tidak boleh lebih dari 1MB!!');
        </script>";
        return false;
    }

    //Membuat nama file baru yang uniq
    $id_random = uniqid();
    $namaFileBaru = $kode . "_" . $id_random . "." . $ekstensiFile;

    $file_path = $target . $namaFileBaru;

    //cekk apakah file sudah terupload
    if (move_uploaded_file($tmpName, $file_path)) {
        echo "<script>alert('file berhasil di upload!!');
        </script>";
        return $namaFileBaru;
    } else {
        echo "<script>alert('Gagak Upload File!!');
        </script>";
        return false;
    }
}



// FUNGSI LOGIN

function login($username, $password)
{
    global $KONEKSI;

    $query = "SELECT u.id_user, u.password, t.nama_tipe 
              FROM tbl_users u
              JOIN tbl_tipe_user t ON u.id_tipe = t.id_tipe
              WHERE u.username = '$username'";

    $result = mysqli_query($KONEKSI, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['role'] = $row['nama_tipe'];
            return $row['nama_tipe'];
        }
    }
    return false;
}

// FUNGSI LOGOUT
function logout()
{
    session_start();
    session_destroy();
    header("Location: login.php");
    exit();
}



//fungsi tambah data admin
function tambah_admin($DATA)
{

    global $KONEKSI;
    global $tgl;

    $id_admin   = stripslashes($_POST['id_admin']);
    $nama_admin = stripslashes($_POST['nama_admin']);
    $email      = strtolower(stripslashes($_POST['email']));
    $telepon    = stripslashes($_POST['telepon']);
    $role       = stripslashes($_POST['role']);
    $password   = mysqli_real_escape_string($KONEKSI, $_POST['password']);
    $password2  = mysqli_real_escape_string($KONEKSI, $_POST['password2']);


    //cek email yang di daftar apakah sudah di pakai apa belum
    $result = mysqli_query($KONEKSI, "SELECT email FROM tbl_users WHERE email='$email' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Email Yang Di Input Sudah Ada Di DataBase!!!')
        document.location.href='?pages=user_admin'
        </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi Password Yang Di Input Tidak Sama!!!')
        document.location.href='?pages=user_admin'
        </script>";
        return false;
    }

    //kita lakukan enkripsi  password yang dia input
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //pastikan data gambar terupload
    $gambar_foto = upload_file();

    //jika tidak upload foto proses kita hentikaan
    if (!$gambar_foto) {
        return false;
    }

    //tambahkan data user baru ke tb_users
    $sql_user = "INSERT INTO tbl_users SET
    id_user ='$id_admin',
    email ='$email',
    password ='$password_hash',
    id_tipe ='$role',
    create_at = '$tgl' ";

    mysqli_query($KONEKSI, $sql_user) or die("GAGAL MENAMBAHKAN USER BARU!!") . mysqli_errno($KONEKSI);

    //tambahkan user baru ke tb_admin
    $sql_user = "INSERT INTO tbl_admin SET
    nama_admin ='$nama_admin',
    telepon_admin ='$telepon',
    path_photo_admin ='$gambar_foto',
    id_user ='$id_admin',
    create_at ='$tgl' ";

    mysqli_query($KONEKSI, $sql_user) or die("GAGAL MENAMBAHKAN ADMIN BARU!!") . mysqli_errno($KONEKSI);

    return mysqli_affected_rows($KONEKSI);
}

//fungsi upload file
function upload_file()
{
    //inisialisasi element dari photo/gambar
    $namaFile = $_FILES['Photo']['name'];
    $ukuranFile = $_FILES['Photo']['size'];
    $error = $_FILES['Photo']['error'];
    $tmpName = $_FILES['Photo']['tmp_name'];
    $tipeFile = $_FILES['Photo']['type'];
    $id_admin = $_POST['id_admin'];

    //kita pastikan user upload file
    if ($error == 4) { // 4 artinya tidak ada file yang di upload
        echo "<script>alert('Tidak ada File Yang Di Upload')</script>";
        return false;
    }

    //kita pastikan validasi ekstensi file
    $ekstensiValid = ['jpg', 'jpeg', 'bmp', 'png'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $ekstensiValid)) {
        echo "<script>alert('file yang anda upload bukan gambar')</script>";
        return false;
    }

    //kita validasi ukuran maksimal gambar
    if ($ukuranFile > 1 * 1024 * 1024) {
        echo "<script>alert('GAMBAR TIDAK BOLEH LEBIH DARI 1M')</script>";
        return false;
    }

    //membuat nama file baru yang uniq
    $id_random = uniqid();
    $namaFileBaru = $id_admin . "_" . $id_random . "." . $ekstensiFile;

    $target = '../images/users/';
    $file_path = $target . $namaFileBaru;

    //kita cek/debag apalah nama baru sudah terbentuk, jika ada langsung upload file
    echo "Menyalin File ke : " . $file_path;
    if (move_uploaded_file($tmpName, $file_path)) {
        echo "<script>alert('file berhasil di upload')</script>";
        return $namaFileBaru;
    } else {
        echo "<script>alert('Upload gagal, Cobalagii!!')</script>";
        return false;
    }
}

//fungsi edit admin
function edit_admin($data)
{
    global $KONEKSI;
    global $tgl;

    $id_admin   = htmlspecialchars($data['id_admin']);
    $nama_admin = htmlspecialchars($data['nama_admin']);
    $email      = htmlspecialchars($data['email']);
    $telepon    = htmlspecialchars($data['telepon']);
    $foto_lama  = htmlspecialchars($data['photo_db']);

    $target = '../images/users/';
    $cek_file_lama = $target . $foto_lama; //lokasi foto lama

    // cek apakah ada file baru yang di upload oleh user
    if (isset($_FILES['Photo']) && $_FILES['Photo']['error'] !== UPLOAD_ERR_NO_FILE) {
        //jika ada file gambar baru yang di upload
        $foto_edit = upload_file();

        //kita pastikan nama file baru terupload (Debuggin)
        echo "File Baru :" . $foto_edit . "Berhasil Di Upload";

        //kita pastikan file lama terhapus (unlink)
        //cek dulu file lama di db apakah ada di folder target
        if ($foto_edit && file_exists($cek_file_lama)) {
            if (unlink($cek_file_lama)) {
                // true ==> Berhasil hapus data lama
                echo "Berhasil hapus file lama";
            } else {
                //false ==> gagal hapus file lama
                echo "Gagal hapus file lama";
            }
        }
    } else {
        //jika tidak ada file gambar baru yang di upload
        $foto_edit = $foto_lama;
        echo "Menggunakan Foto Lama : " . $foto_lama;
    }


    //update (edit) data ke tbl_admin
    $sql_user = "UPDATE tbl_admin SET
    nama_admin ='$nama_admin',
    telepon_admin ='$telepon',
    path_photo_admin ='$foto_edit',
    update_at ='$tgl' WHERE tbl_admin.id_user ='$id_admin' ";


    //cek apakah query update data berhasil
    if (mysqli_query($KONEKSI, $sql_user)) {
        echo "<script>alert('Data Berhasil Di Update!!')</script>";
    } else {
        echo "<script>alert('Data Gagal Di Update!!')</script>";
    }


    return mysqli_affected_rows($KONEKSI);
} //kurung tutup function edit_admin


// fungsi hapus user admin
function hapus_admin()
{
    global $KONEKSI;
    $id_user = $_GET['id'];

    // hapus file gambar yang usernya kita hapus
    $sql = "SELECT * FROM tbl_admin WHERE id_user='$id_user' " or die("Data tidak ditemukan" . mysqli_error($KONEKSI));
    $hasil = mysqli_query($KONEKSI, $sql);
    $row = mysqli_fetch_assoc($hasil);

    $photo = $row['path_photo_admin'];
    $target = '../images/users/';

    if (!$photo == "") {
        // Jika ada maka kita hapus
        unlink($target . $photo);
    }


    // hapus data di tabel admin
    $query_admin = "DELETE FROM tbl_admin WHERE id_user='$id_user' ";
    mysqli_query($KONEKSI, $query_admin) or die("Gagal melakukan hapus data admin" . mysqli_error($KONEKSI));

    // hapus data di tabel users
    $query_user = "DELETE FROM tbl_users WHERE id_user='$id_user' ";
    mysqli_query($KONEKSI, $query_user) or die("Gagal melakukan hapus data user" . mysqli_error($KONEKSI));


    return mysqli_affected_rows($KONEKSI);
}

//fungsi upload file menggunakan parameter (NEW)
function upload_new_file($data, $file, $target)
{
    //inisialisasi elemen dari foto/filenya
    $namaFile = $file['Photo']['name'];
    $ukuranFile = $file['Photo']['size'];
    $error = $file['Photo']['error'];
    $tmpName = $file['Photo']['tmp_name'];
    $tipeFile = $file['Photo']['type'];

    $kode   = htmlspecialchars($data['kode']);

    //debug buat element $data dan $file

    echo "<pre>";
    print_r($data);  //melihat data yang akan di terima
    print_r($file);  //melihat data yang akan di terima
    echo "</pre>";

    //pastikan bahwa user melakukan upload file

    if ($error == UPLOAD_ERR_NO_FILE) {
        echo "<script>alert('Tidak ada file yang di upload!!');
        </script>";
        return false;
    }

    //validasi ekstenssi file
    $ekstensiValid = ['jpg', 'jpeg', 'bmp', 'png'];
    $ekstensiFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (! in_array($ekstensiFile, $ekstensiValid)) {
        echo "<script>alert('file yang anda upload bukan gambar!!');
        </script>";
        return false;
    }

    //Validasi ukuran gambar
    if ($ukuranFile > 1 * 1024 * 1024) {
        echo "<script>alert('ukuran file tidak boleh lebih dari 1MB!!');
        </script>";
        return false;
    }

    //Membuat nama file baru yang uniq
    $id_random = uniqid();
    $namaFileBaru = $kode . "_" . $id_random . "." . $ekstensiFile;

    $file_path = $target . $namaFileBaru;

    //cekk apakah file sudah terupload
    if (move_uploaded_file($tmpName, $file_path)) {
        echo "<script>alert('file berhasil di upload!!');
        </script>";
        return $namaFileBaru;
    } else {
        echo "<script>alert('Gagak Upload File!!');
        </script>";
        return false;
    }
}


//fungsi tambah petugas
function tambah_pengguna($data, $file, $target)
{
    global $KONEKSI;
    global $tgl;

    $id_pengguna   = htmlspecialchars($_POST['kode']);
    $nama_png = htmlspecialchars($_POST['nama_png']);
    $jenkel      = htmlspecialchars($_POST['jenkel']);
    $email    = htmlspecialchars($_POST['email']);
    $telepon    = htmlspecialchars($_POST['telepon']);
    $role       = stripslashes($_POST['id_tipe']);
    $password    = mysqli_real_escape_string($KONEKSI, $_POST['password']);
    $password2       = mysqli_real_escape_string($KONEKSI, $_POST['password2']);

    //kita harus upload file
    $gambar_foto = upload_file_new($data, $file, $target);

    //jika gambar di upload operasi di hentikan
    if (!$gambar_foto) {
        return false;
    }

    //cek email yang di daftar apakah sudah di pakai apa belum
    $result = mysqli_query($KONEKSI, "SELECT email FROM tbl_users WHERE email='$email' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Email Yang Di Input Sudah Ada Di DataBase!!!')
        document.location.href='?pages=user_petugas'
        </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi Password Yang Di Input Tidak Sama!!!')
        document.location.href='?pages=user_pengguna'
        </script>";
        return false;
    }

    //kita lakukan enkripsi  password yang dia input
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan data user baru ke tb_users
    $sql_user = "INSERT INTO tbl_users SET
    id_user ='$id_pengguna',
    email ='$email',
    password ='$password_hash',
    id_tipe ='$role',
    create_at = '$tgl' ";

    mysqli_query($KONEKSI, $sql_user) or die("GAGAL MENAMBAHKAN USER BARU!!") . mysqli_error($KONEKSI);

    //tambahkan user baru ke tb_admin
    $sql_petugas = "INSERT INTO tbl_pengguna SET
    nama_pengguna ='$nama_png',
    telepon_pengguna ='$telepon',
    path_photo_pengguna ='$gambar_foto',
    id_user ='$id_pengguna',
    jenkel ='$jenkel',
    create_at ='$tgl' ";

    mysqli_query($KONEKSI, $sql_petugas) or die("GAGAL MENAMBAHKAN PENGGUNA BARU!!") . mysqli_error($KONEKSI);

    return mysqli_affected_rows($KONEKSI);
}


?>