<?php 
require_once "../inc/function.php";

hapus_admin($_POST);


// Kita butuh data id_pelanggan dan id_ruangan
// Namun yang kita punya hanya id_pelanggan
// Sehingga kita harus mencari id_ruangan dengan cara select dulu datanya berdasarkan id_ruangan

?>
<meta http-equiv="refresh" content="0.5; url=index.php?pages=user_admin">