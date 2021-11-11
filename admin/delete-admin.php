<?php
    include('../config/constants.php');
    // get the ID to be deleted
    $id = $_GET['id'];
    // create sql query
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    // execute the query
    $res = mysqli_query($conn, $sql);
    if($res==true){
        $_SESSION['delete'] = "Admin Berhasil Dihapus";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else{
        $_SESSION['delete'] = "Admin Gagal Dihapus";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>