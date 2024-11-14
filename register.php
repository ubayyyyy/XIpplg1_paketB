<!DOCTYPE html>
<html>
<head>
    <title>HALAMAN FORM REGISTER</title>
    <link rel="stylesheet" type= "text/css" href="style.css">
</head>
<body>
    <div class="kotak_login">
        <p class="tulisan_login">Register</p>
        <form action="cekregister.php" method="post" role="form">
        <labe>Username</label>
        <input type="text" name="username" class="form_login" placeholder="Username" autocomplate="off">
        <labe>Password</label>
        <input type="text" name="password" class="form_login" placeholder="Password" autocomplate="off">
        <labe>Email</label>
        <input type="text" name="email" class="form_login" placeholder="Email" autocomplate="off">
        <input type="submit" class="tombol_login" value="Save">
    </form>
    <br/><hr/>
    <a href="login.php"><p style="text-align: center;">BACK</p>
    </div>
</body>
</html>