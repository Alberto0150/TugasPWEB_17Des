<?php
    include 'dbconnection.php';
    session_start();

    if(addGuest(isset($_POST['Submit'])) > 0){
        $_SESSION["sukses"] = "Guest berhasil ditambahkan";
    }else {
        $_SESSION["gagal"] = "Guest gagal ditambahkan";
    }

    header('Location: ../view.php');
    exit();
?>