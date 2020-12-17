<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\login.css"/>
</head>
<body>
<div class="opening">
<form action="backend/login.php" method="post">
    <table>
        <tr>
            <td>Username </td>
            <td><input type="text"name="A_USERNAME"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password"name="A_PASSWORD"></td>
        </tr>
        <tr>
            <td>&nbsp</td>
            <td><input type="submit"name="Login" value="Proses"></td>
        </tr>
    </table>
</form>
</div>
</body>