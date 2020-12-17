<?php
    include 'dbconnection.php';
    session_start();

    if(deleteGuest(isset($_POST['Submit'])) > 0){
        $_SESSION["sukses"] = "Guest berhasil dihapus";
    }else {
        $_SESSION["gagal"] = "Guest gagal dihapus";
    }

    header('Location: ../view.php');
    exit();
?>