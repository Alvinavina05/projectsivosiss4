<?php
// Include file koneksi

session_start(); // Mulai sesi

// Cek apakah pengguna sudah login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}


include '../koneksi/koneksi.php';
// Tangkap ID pengguna yang sedang login (dari sesi)
$username = $_SESSION['nama_lengkap'];

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $password_lama = hash('sha256', $_POST['password_lama']);
    $password_baru = hash('sha256', $_POST['password_baru']);
    $konfirmasi_password = hash('sha256', $_POST['konfirmasi_password']);

    // Query untuk mengambil password saat ini dari database
    $query = "SELECT pass FROM data_user WHERE user='$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $password_db = $row['pass'];

        // Verifikasi password lama dengan password yang ada di database
        if ($password_lama == $password_db) {
            // Verifikasi password baru dan konfirmasi password baru
            if ($password_baru == $konfirmasi_password) {
                // Update password baru ke dalam database
                $update_query = "UPDATE data_user SET pass='$password_baru' WHERE id='$user_id'";
                $update_result = mysqli_query($koneksi, $update_query);

                if ($update_result) {
                    echo "<script>alert('Password berhasil diubah!')</script>";
                } else {
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                }
            } else {
                echo "<script>alert('Konfirmasi password baru tidak sesuai.')</script>";
            }
        } else {
            echo "<script>alert('Password lama salah.')</script>";
        }
    }
}
?>

<!-- Form untuk mengubah password -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (Head HTML lainnya) ... -->
</head>
<body>
    <h1>Ubah Password</h1>
    <form method="post">
        <label for="password_lama">Password Lama:</label>
        <input type="password" name="password_lama" required><br>

        <label for="password_baru">Password Baru:</label>
        <input type="password" name="password_baru" required><br>

        <label for="konfirmasi_password">Konfirmasi Password Baru:</label>
        <input type="password" name="konfirmasi_password" required><br>

        <input type="submit" name="submit" value="Ubah Password">
    </form>
</body>
</html>
