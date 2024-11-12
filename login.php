<!DOCTYPE html>
<html lang="en">
<head>
    <title>HALAMAN FROM LOGIN</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="kotak_login">
        <p class="tulisan_login"> Silahkan Login</p>
        <form action="ceklogin.php" method="pose" role="form"></form>
        <label>Username</label>
        <input type="text" name="username" class="form_login" placeholder="Username" autocomplate="off">
        <label>Password</label>
        <input type="password" name="password" class="form_login" placeholder="Password" autocomplate="off">
        <input type="submit" class="tombol_login" value="Login">
    </div>
</body>
</html>