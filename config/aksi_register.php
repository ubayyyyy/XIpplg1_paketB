<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

// Debug: Cek variabel
// echo "Username: $username, Password: $password, Email: $email, Nama Lengkap: $namalengkap, Alamat: $alamat";

$stmt = $koneksi->prepare("INSERT INTO user (username, password, email, namalengkap, alamat) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $username, $password, $email, $namalengkap, $alamat);

if ($stmt->execute()) {
    echo "<script>
    alert('Pendaftaran akun berhasil');
    location.href='../login.php';
    </script>";
} else {
    echo "<script>
    alert('Pendaftaran gagal: " . $stmt->error . "');
    location.href='../register.php';
    </script>";
}

$stmt->close();
$koneksi->close();
?>
