<?php session_start(); include "koneksi.php"; ?>
HALO SELAMAT DATANG!! <br/>
Anda Login Sebagai <strong><?php echo  $_SESSION['level']; ?></strong>
<br/><br/>
<a href="login.php">BACK</a>