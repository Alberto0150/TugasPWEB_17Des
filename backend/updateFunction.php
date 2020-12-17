<?php
    include 'dbconnection.php';
    session_start();

    if(updateGuest(isset($_POST['Update'])) > 0){
        $_SESSION["sukses"] = "Guest berhasil diupdate";
    }else {
        $_SESSION["gagal"] = "Guest gagal diupdate";
    }

    header('Location: ../view.php');
    exit();
?>