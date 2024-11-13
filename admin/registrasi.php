<?php
session_start();
include '../koneksi.php';

if (isset($_POST['register'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);
    $password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));
    $level = "Petugas"; // Set level as Petugas by default

    // Check if email already exists
    $check_email = mysqli_query($koneksi, "SELECT * FROM tbl_petugas WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='registrasi.php';</script>";
    } else {
        // Insert new user with hashed password
        $query = "INSERT INTO tbl_petugas (nama, email, telepon, password, level) 
                  VALUES ('$nama', '$email', '$telepon', '$password', '$level')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Halaman Registrasi</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-login">
    <!-- Register Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi Petugas</h1>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['error'])) {
                                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                                        unset($_SESSION['error']);
                                    }
                                    if (isset($_SESSION['success'])) {
                                        echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
                                        unset($_SESSION['success']);
                                    }
                                    ?>
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" name="telepon" placeholder="Nomor Telepon" maxlength="16" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="register" class="btn btn-primary btn-block">Daftar</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Sudah punya akun? <a class="font-weight-bold small" href="login.php">Login disini.</a>
                                    </div>
                                    <div class="text-center">
                                        <hr>
                                        <!-- <div class="text-center">
                                            Untuk login ke halaman Admin <a class="font-weight-bold small" href="admin/login.php">Login disini.</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>