<?php

    $db = mysqli_connect("localhost", "root", "", "guest_book");
    if( !$db ){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    function getAllUser($query_sintax) {
        global $db;
        $all_result = mysqli_query($db, $query_sintax);
    
        dbclose();
        return $all_result;
    }

    function addGuest($request) {
        global $db;

        $nama = $_POST['nama'];
        $ktp = $_POST['ktp'];
        $telp = $_POST['telp'];
        $pembayaran = $_POST['pembayaran'];
        $biaya = $_POST['biaya'];
        

        mysqli_query($db, "INSERT INTO guest(G_NAMA, G_KTP, G_TELP, G_JENIS_BAYAR, G_BIAYA) VALUES('$nama', '$ktp', '$telp', '$pembayaran', '$biaya')");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function updateGuest($request) {
        global $db;

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $ktp = $_POST['ktp'];
        $telp = $_POST['telp'];
        $pembayaran = $_POST['pembayaran'];
        $biaya = $_POST['biaya'];
        

        mysqli_query($db, "UPDATE guest SET G_NAMA = '$nama', G_KTP = '$ktp', G_TELP = '$telp', G_JENIS_BAYAR = '$pembayaran' , G_BIAYA = '$biaya' WHERE G_ID = '$id'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function deleteGuest($request){
        global $db;

        $ids = $_POST['userId'];

        mysqli_query($db, "DELETE FROM guest WHERE G_ID = $ids");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function dbclose() {
        mysqli_close(mysqli_connect("localhost", "root", "", "guest_book"));
    }
?>