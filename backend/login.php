<?php session_start();
include "../backend/dbconnection.php";
$A_USERNAME=$_POST['A_USERNAME'];
$A_PASSWORD=md5($_POST['A_PASSWORD']);

$laporan1 ="";
$laporan2 ="";
$rekaplaporan ="";
if(empty($_POST['A_USERNAME']))
{
    $laporan1 = "Username ";
}
if (empty($_POST['A_PASSWORD']))
{
    $laporan2 = "Password ";
}

$query=mysqli_query($db,"SELECT * 
    FROM admin 
    WHERE A_USERNAME = '$A_USERNAME'
    AND A_PASSWORD = '$A_PASSWORD'");

$cek=mysqli_num_rows($query);

if($cek){
    $_SESSION['A_USERNAME']=$A_USERNAME;
    ?>Anda berhasil login. silahkan menuju menu utama<a href="../view.php"> Homepage admin </a><?php
}
else{
    if($laporan1 != "" && $laporan2 != "")
    {
        $rekaplaporan = "{$laporan1} dan {$laporan2} ";
    }
    else if ($laporan1 != "" && $laporan2 == "")
    {
        $rekaplaporan = $laporan1;
    }
    else if ($laporan1 == "" && $laporan2 != "")
    {
        $rekaplaporan = $laporan2;
    }
    $rekaplaporan = $rekaplaporan." belum anda isikan";
    echo "<script type='text/javascript'>alert('$rekaplaporan');</script>";
    ?>Anda gagal login. silahkan kembali <a href="../index.php"> Homepage</a><?php
    // echo mysqli_error();
}
?>