<?php
    include "koneksi.php"

    $username = $_POST ('username');
    $password = $_POST ('password');
    $email = $_POST ('email');

    $query = "INSERT INTO tb_login VALUES"(
        '$username', '$password',
        '$email'
    )";

    $sql = mysqli_query($query) or die (mysqli_error());

    if ($sqli) {
        echo '<script language = "javascript">
        alert ("Data berhasil di simpan!. Silahkan Login.");
        document.location="login.php";</script>';
    }else {
        echo '<script language = "javascript">
        alert ("Data gagal di simpan!.");
        document.location="login.php";</script>';
    }
    
