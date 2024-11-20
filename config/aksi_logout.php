<?php
session_start(); 

echo "<script>
    alert('Logout berhasil');
    window.location.href='../index.php';
    </script>";
exit(); 
?>
