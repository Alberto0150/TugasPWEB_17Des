
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis PWEB</title>
</head>
<body>
    <thread>
    <tr>
        <th>NAMA</th>
        <th>WAKTU</th>
    </tr>
    </thread>
    <tbody>
    <?php
        include('dbconnection.php');

        $log = $db->real_escape_string('SELECT * FROM UPLOAD');
        $query = $db->query($log);
        while($hasil =$query->fetch_assoc());
    ?>
    <tr>
        <td><?= $hasil['username'] ?></td>
        <td><?= $hasil['timestamp'] ?></td>
    </tr>
    <?php
        endwhile;
    ?>
    </tbody>
</body>
</html>