<?php

$db = mysqli_connect("localhost", "root", "", "guest_book");
    if( !$db ){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

function getAllLog($query_sintax) { // nampilin log upload
    global $db;
    $all_result = mysqli_query($db, $query_sintax);

    dbclose();
    return $all_result;
}
function
  
function upload($REQUEST)
{
    $base64_string = $_POST['image'];
    $username = $_POST['username'];
    $password = $_POST["password"];
    $image_name = "D:\\xampp\\htdocs\\uploadFace\\".$username;

    if (!file_exists($image_name)) {
    if (!mkdir($image_name)) {
        $m=array('msg' => "REJECTED, cant create folder");
        echo json_encode($m);
        return;}
    }

    $fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
    $fileCount = iterator_count($fi)+1;
    $data = explode(',', $base64_string);
    $fullName = $image_name."\\X__".$fileCount."_". date("YmdHis") .".png";
    $ifp = fopen($fullName, "wb");
    fwrite($ifp, base64_decode($data[1]));
    fclose($ifp);
    if (!$ifp){
        $m=array('msg' => "REJECTED, ".$fullName."not saved");
        echo json_encode($m);
        return;}

    // $command = escapeshellcmd("python checkFace.py ".$fullName);
    // $output = shell_exec($command);

    $fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
    $fileCount = iterator_count($fi);
    $m = array('msg' => "Berhasil Mengirim"." total(".$fileCount.")");
    echo json_encode($m);
}

?>
