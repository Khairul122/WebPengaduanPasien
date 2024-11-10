<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']); 
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi NIK (harus 16 digit)
    if (strlen($nik) != 16) {
        $_SESSION['error'] = "NIK harus 16 digit!";
        header("Location: registrasi.php");
        exit();
    }

    // Cek apakah NIK sudah terdaftar
    $cek_nik = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat WHERE nik = '$nik'");
    if (mysqli_num_rows($cek_nik) > 0) {
        $_SESSION['error'] = "NIK sudah terdaftar!";
        header("Location: registrasi.php");
        exit();
    }

    // Cek apakah email sudah terdaftar
    $cek_email = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        $_SESSION['error'] = "Email sudah terdaftar!";
        header("Location: registrasi.php");
        exit();
    }

    // Validasi password
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Password tidak cocok!";
        header("Location: registrasi.php");
        exit();
    }

    if (strlen($password) < 6) {
        $_SESSION['error'] = "Password minimal 6 karakter!";
        header("Location: registrasi.php");
        exit();
    }

    // Hash password
    $hashed_password = md5($password); // Menggunakan MD5 untuk kompatibilitas dengan data yang ada

    // Query untuk insert data
    $query = "INSERT INTO tbl_masyarakat (nik, nama, email, password) 
              VALUES ('$nik', '$nama', '$email', '$hashed_password')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['success'] = "Registrasi berhasil! Silahkan login.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan: " . mysqli_error($koneksi);
        header("Location: registrasi.php");
        exit();
    }
} else {
    header("Location: registrasi.php");
    exit();
}
?>