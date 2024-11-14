<?php
     include "koneksi.php";

     $username = $_POST['username'];
     $password = $_POST['password'];

     $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password' ") or die (mysql_error());

     if(mysqli_num_rows($sql) == 0) {
        echo '<script language = "javascript">
        alert("Username dan Password Salah! Silahkan Login Kembali."); document.location="Login.php";</script>';
     }else{
        echo '<script language = "javascript">
        alert("Anda berhasil Login!."); document.locatioan="halaman.php";</script>';
     } 

     ?>