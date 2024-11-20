<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d'); 
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand() . '-' . $foto;

    $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES ('', '$judulfoto', '$deskripsifoto', '$tanggalunggah', '$namafoto', '$albumid', '$userid')");

    // Pastikan file berhasil diupload
    if (move_uploaded_file($tmp, $lokasi . $namafoto)) {
        echo "<script>
        alert('Data berhasil disimpan!');
        location.href='../admin/foto.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal mengupload file!');
        location.href='../admin/foto.php';
        </script>";
    }
}

if (isset($_POST['edit'])) {
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d'); // Perbaiki format tanggal
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand() . '-' . $foto;

    if ($foto == null) {
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', albumid='$albumid' WHERE fotoid='$fotoid'");

    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
        $data = mysqli_fetch_array($query);
        if (is_file('../assets/img/' . $data['lokasifile'])) {
            unlink('../assets/img/' . $data['lokasifile']);
        }
        move_uploaded_file($tmp, $lokasi . $namafoto);
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', lokasifile='$namafoto', albumid='$albumid' WHERE fotoid='$fotoid'");
    }

    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../admin/foto.php';
    </script>";
}
if (isset($_POST['hapus'])) {
$fotoid = $_POST[ 'fotoid'];
$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
        $data = mysqli_fetch_array($query);
        if (is_file('../assets/img/' . $data['lokasifile'])) {
            unlink('../assets/img/' . $data['lokasifile']);
        }
        $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");
        echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../admin/foto.php';
    </script>";
}
?>

<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['userid'])) {
    echo "Anda harus login untuk mengakses file ini.";
    exit;
}

$userid = $_SESSION['userid']; // Ambil user ID dari session
$id_foto = $_GET['id']; // ID foto yang diminta

// Query untuk memastikan bahwa foto ini milik pengguna yang login
$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$id_foto' AND userid='$userid'");
if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $file_path = '../assets/img/' . $data['lokasifile'];

    if (file_exists($file_path)) {
        header('Content-Type: image/jpeg'); // Sesuaikan dengan tipe file
        readfile($file_path); // Tampilkan file
        exit;
    } else {
        echo "File tidak ditemukan.";
    }
} else {
    echo "Anda tidak memiliki akses ke foto ini.";
}
?>
