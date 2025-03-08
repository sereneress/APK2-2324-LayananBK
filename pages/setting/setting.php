<?php
@$pages = $_GET['aksi'];
switch ($pages) {

        case 'edit':
                include "edit_setting.php";
                break;

        default:
                include "edit_setting.php";
                break;
}

?>