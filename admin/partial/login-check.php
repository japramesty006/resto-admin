<?php
    if(!isset($_SESSION['user'])){
       $_SESSION['no-login-message'] = "Silahkan Login untuk Mengakses Halaman Admin";
        header('location:'.SITEURL.'admin/login.php');
    }
?>