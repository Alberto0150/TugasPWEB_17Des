<?php
    require './backend/sendFace.php';
    $all_log = getAllLog("SELECT * FROM uploadtime");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
</head>
<body>
    <div class="upload">
    <h1>Select image to upload:</h1>
    <form action="./backend/sendFace.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input class="form-input" type="text" id="username" name="username" placeholder="Username"/>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-input" type="text" id="password" name="password" placeholder="Password"/>
            </div>
            <label class="fileContainer">
            <input type="file" data-multiple-caption="{count} files selected" multiple name="fileToUpload" id="fileToUpload" class="inputfile">
            </label>
        <div class="btn">
            <input id="sub-btn" type="submit" value="Upload Image" name="submit">
        </div>
    </form>
    </div>
    <div class="tableContainer">
    <?php
        echo "<table class='table table-striped table-hover table-scroll'>";
        echo("
        <thead>
            <tr>
                <th>NAMA</th>
                <th>WAKTU</th>
            </tr>
        </thead>
        ");

        echo"<tbody>";

        //ambil log
        while($log = mysqli_fetch_array($all_log)){?>
        <tr>
            <td><?php echo $log['NAMA']; ?></td>
            <td><?php echo $log['WAKTU']; ?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
        </table>            
    </div>

</body>
</html>