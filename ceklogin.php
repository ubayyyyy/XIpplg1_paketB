<?php
     include "koneksi.php";

     $username = $_POST['username'];
     $password = $_POST['password'];

     $qry = "SELECT * FROM
           tb_login
      WHERE username = '".$username."'
      AND password
       = '".$password"'";

     $sql = mysqli_query($connection, $qry)

     $cek =mysqli_num_rows($sql);

     if($cek == 0) {
        echo '<script language = "javascript">
        alert("Username dan Password Salah! Silahkan Login Kembali."); document.location="Login.php";</script>';
     }else{
        $data = mysqli_fetch_assoc($sql);

        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];

         echo '<script language = "javascript">
         alert("Anda Berhasil Login.!">;               
         document.location="halaman.php";
         </script>';
     } 

     ?>