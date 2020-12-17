
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis PWEB</title>
    <?php
    include('extend.php');
    ?>
</head>
<body>
    <div class="container-fluid">
        <table class="table table-striped">
        <thread>
        <tr>
            <th>NAMA</th>
            <th>WAKTU</th>
        </tr>
        </thread>
        <tbody>
        <?php
            include('dbconnection.php');

            $log = $db->real_escape_string('SELECT * FROM upload');
            $query = $db->query($log);
            while($hasil =$query->fetch_assoc()):
        ?>
        <tr>
            <td><?= $hasil['USERNAME'] ?></td>
            <td><?= $hasil['WAKTU'] ?></td>
        </tr>
        <?php
            endwhile;
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>