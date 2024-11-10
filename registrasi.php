<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (!empty($_SESSION['email'])) {
    header("location:index.php");
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
                                        <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi Pengguna</h1>
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
                                    <form class="user" action="proses-registrasi.php" method="post" onsubmit="return validateForm()">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama" name="nama" 
                                                   placeholder="Nama Lengkap" required pattern="[A-Za-z\s]+" 
                                                   title="Nama hanya boleh berisi huruf dan spasi">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nik" name="nik" 
                                                   placeholder="NIK" required pattern="[0-9]{16}" 
                                                   title="NIK harus 16 digit angka">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   placeholder="Alamat Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" 
                                                   placeholder="Password" required minlength="6">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="confirm_password" 
                                                   name="confirm_password" placeholder="Konfirmasi Password" required>
                                            <small id="passwordError" class="text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Sudah punya akun? <a class="font-weight-bold small" href="login.php">Login disini.</a>
                                    </div>
                                    <div class="text-center">
                                        <hr>
                                        <div class="text-center">
                                            Untuk login ke halaman Admin <a class="font-weight-bold small" href="admin/login.php">Login disini.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    
    <script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        var passwordError = document.getElementById("passwordError");
        var nik = document.getElementById("nik").value;
        
        // Reset error message
        passwordError.textContent = "";
        
        // Validasi NIK
        if (nik.length !== 16) {
            passwordError.textContent = "NIK harus 16 digit!";
            return false;
        }
        
        // Check if passwords match
        if (password !== confirmPassword) {
            passwordError.textContent = "Password tidak cocok!";
            return false;
        }
        
        // Check password length
        if (password.length < 6) {
            passwordError.textContent = "Password harus minimal 6 karakter!";
            return false;
        }
        
        return true;
    }
    
    // Real-time password validation
    document.getElementById("confirm_password").addEventListener("input", function() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        var passwordError = document.getElementById("passwordError");
        
        if (password !== confirmPassword) {
            passwordError.textContent = "Password tidak cocok!";
        } else {
            passwordError.textContent = "";
        }
    });
    </script>
</body>

</html>