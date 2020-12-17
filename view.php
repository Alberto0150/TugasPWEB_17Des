<?php session_start();
    if(isset($_SESSION['A_USERNAME']))
    {
        ?>

<?php
    require './backend/dbconnection.php';
    $all_user = getAllUser("SELECT * FROM guest");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css\main.css"/>
</head>
<body>
    <main>
        <?php 
        if (isset($_SESSION["sukses"]))
        {
            echo '<div class="toast toast-success">';
            echo '<button class="btn btn-clear float-right"></button>';
            echo $_SESSION["sukses"];
            echo '</div>';

            unset($_SESSION["sukses"]);
        }
        if (isset($_SESSION["gagal"]))
        {
            echo '<div class="toast toast-warning">';
            echo '<button class="btn btn-clear float-right"></button>';
            echo $_SESSION["gagal"];
            echo '</div>';

            unset($_SESSION["gagal"]);
        }
        ?>
        
        <div class='tableContainer'>
            <?php        
                echo "<table class='table table-striped table-hover table-scroll'>";
                echo("
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>KTP</th>
                        <th>TELP</th>
                        <th>JENIS PEMBAYARAN</th>
                        <th>BIAYA</th>
                        <th>HAPUS</th>
                        <th>PERBAHARUI</th>
                    </tr>
                </thead>
                ");
                
                echo "<tbody>";
                //ambil record
                while($user = mysqli_fetch_array($all_user)){?>
                    <tr>
                    <td><?php echo $user['G_ID']; ?></td>
                    <td><?php echo $user['G_NAMA']; ?></td>
                    <td><?php echo $user['G_KTP']; ?></td>
                    <td><?php echo $user['G_TELP']; ?></td>
                    <td><?php echo $user['G_JENIS_BAYAR']; ?></td>
                    <td><?php echo $user['G_BIAYA']; ?></td>
                    <form method='POST' action='backend/deleteFunction.php'>
                        <input name='userId' value=<?php echo $user['G_ID']; ?> hidden/>
                        <td><button type='submit' class='btn btn-error'>
                            <i class='fa fa-trash' aria-hidden='true'> Hapus</i>
                        </button></td>
                    </form>
                    <td class='tableItem'>
                    <a class="btn btn btn-primary" href="#modalUpdate-<?php echo $user['G_ID'];?>"><i class='fa fa-pencil' aria-hidden='true'> Update
                    </i></a>
                    <div class="modal" id="modalUpdate-<?php echo $user['G_ID'];?>">
                        <a href="#close" class="modal-overlay" aria-label="Close"></a>
                        <div class="modal-container">
                            <div class="modal-header">
                                <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
                            <div class="modal-title h5">Update Data Guest</div>
                            </div>
                            <div class="modal-body">
                            <form action="backend/updateFunction.php" method="POST">
                            <?php
                                $id = $user['G_ID']; 
                                $query_edit = getAllUser("SELECT * FROM guest WHERE G_ID='$id'");
                                while ($user_edit= mysqli_fetch_array($query_edit)) {  
                            ?>
                                <div class="content">
                                    <input class="form-input" type="hidden" id="id" name="id" value="<?php echo $user_edit['G_ID']; ?>">
                                    <div class="form-group">
                                        <div class="text-left"> 
                                            <label class="form-label" for="nama">Nama</label>
                                        </div>
                                        <input class="form-input" type="text" id="nama" name="nama" value="<?php echo $user_edit['G_NAMA']; ?>"placeholder="Nama Guest" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-left"> 
                                            <label class="form-label" for="ktp">No KTP</label> 
                                        </div>
                                        <input class="form-input" type="text" id="ktp" name="ktp" value="<?php echo $user_edit['G_KTP']; ?>"placeholder="Nomor KTP" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-left">
                                            <label class="form-label" for="telp">Nomor Telepon</label>
                                        </div>  
                                        <input class="form-input" type="text" id="telp" name="telp" value="<?php echo $user_edit['G_TELP']; ?>"placeholder="Nomor Telepon" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-left">
                                            <label class="form-label" for="pembayaran">Jenis Pembayaran</label>
                                        </div>
                                        <select class="form-select" id="pembayaran" name="pembayaran" required>
                                            <?php 
                                            if( $user_edit['G_JENIS_BAYAR'] == "CASH")
                                            {
                                                echo "<option value='CASH' selected>CASH</option>";
                                                echo "<option value='DEBIT BCA'>DEBIT BCA</option>";
                                                echo "<option value='DEBIT MANDIRI'>DEBIT MANDIRI</option>";
                                                echo "<option value='DEBIT BRI'>DEBIT BRI</option>";
                                                echo "<option value='DEBIT BNI'>DEBIT BNI</option>"; 
                                            }
                                            elseif ($user_edit['G_JENIS_BAYAR'] == "DEBIT BCA")
                                            {
                                                echo "<option value='CASH'>CASH</option>";
                                                echo "<option value='DEBIT BCA' selected>DEBIT BCA</option>";
                                                echo "<option value='DEBIT MANDIRI'>DEBIT MANDIRI</option>";
                                                echo "<option value='DEBIT BRI'>DEBIT BRI</option>";
                                                echo "<option value='DEBIT BNI'>DEBIT BNI</option>";   
                                            }
                                            elseif ($user_edit['G_JENIS_BAYAR'] == "DEBIT MANDIRI")
                                            {
                                                echo "<option value='CASH'>CASH</option>";
                                                echo "<option value='DEBIT BCA' >DEBIT BCA</option>";
                                                echo "<option value='DEBIT MANDIRI' selected>DEBIT MANDIRI</option>";
                                                echo "<option value='DEBIT BRI'>DEBIT BRI</option>";
                                                echo "<option value='DEBIT BNI'>DEBIT BNI</option>";   
                                            }
                                            elseif ($user_edit['G_JENIS_BAYAR'] == "DEBIT BRI")
                                            {
                                                echo "<option value='CASH'>CASH</option>";
                                                echo "<option value='DEBIT BCA' >DEBIT BCA</option>";
                                                echo "<option value='DEBIT MANDIRI'>DEBIT MANDIRI</option>";
                                                echo "<option value='DEBIT BRI' selected>DEBIT BRI</option>";
                                                echo "<option value='DEBIT BNI'>DEBIT BNI</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='CASH'>CASH</option>";
                                                echo "<option value='DEBIT BCA' >DEBIT BCA</option>";
                                                echo "<option value='DEBIT MANDIRI'>DEBIT MANDIRI</option>";
                                                echo "<option value='DEBIT BRI'>DEBIT BRI</option>";
                                                echo "<option value='DEBIT BNI' selected>DEBIT BNI</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-left">
                                            <label class="form-label" for="biaya">Biaya</label>
                                        </div>    
                                        <input class="form-input" type="text" id="biaya" name="biaya" value="<?php echo $user_edit['G_BIAYA']; ?>"placeholder="Biaya" required>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <?php 
                                }
                            ?> 
                        </div>
                    </div>
                    
                    </td>
                    </tr>
                <?php 
                    }
                ?>     
                </tbody>
                </table>
        </div>
    </main>
    <a  href="#modal-id"><button class="custom"> Tambah Gambar </button></a>    

    <div class="modal" id="modal-id">
        <a href="#close" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Tambah Gambar</div>
            </div>
            <div class="modal-body">
            <form action="backend/addfunction.php" method="POST">
                <div class="content">
                    <div class="form-group">
                        <label class="form-label" for="nama">Nama</label>
                        <input class="form-input" type="text" id="nama" name="nama" placeholder="Nama Guest" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ktp">No KTP</label>
                        <input class="form-input" type="text" id="ktp" name="ktp" placeholder="Nomor KTP" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="telp">Nomor Telepon</label>
                        <input class="form-input" type="text" id="telp" name="telp" placeholder="Nomor Telepon" required>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <a href="backend/logout.php"><button class="custom">Logout</button></a>
</body>
</html>
<?php
} else {
        ?> Anda tidak dapat mengakses halaman ini. silahkan kembali ke <a href="index.php"> Homepage </a> <?php
    } 
?> 