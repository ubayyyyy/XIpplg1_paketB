<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    
    if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['userid'] = $data['userid'];
        $_SESSION['status'] = 'login';

        echo "<script>
        alert('Login berhasil');
        location.href='../admin/index.php';
        </script>";
    } else {
        echo "<script>
        alert('Password salah!');
        location.href='../login.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Username tidak ditemukan!');
    location.href='../login.php';
    </script>";
}

    if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['userid'] = $data['userid'];
        $_SESSION['status'] = 'login';

        echo "<script>
        alert('Login berhasil');
        location.href='../admin/index.php';
        </script>";
    } else {
        echo "<script>
        alert('Password salah!');
        location.href='../login.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Username tidak ditemukan!');
    location.href='../login.php';
    </script>";
}

$stmt->close();
$koneksi->close();
?>
