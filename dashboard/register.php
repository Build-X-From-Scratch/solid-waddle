<?php
require_once 'config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connect, trim($_POST['username']));
    $email = mysqli_real_escape_string($connect, trim($_POST['email']));
    $password = trim($_POST['password']);
    $repeat_password = trim($_POST['repeat_password']);

    // Validasi dasar
    if ($password !== $repeat_password) {
        $error = 'Password dan Repeat Password tidak cocok!';
    } else {
        // Cek apakah username atau email sudah digunakan
        $check_query = "SELECT * FROM admin WHERE username = ? OR email = ?";
        $stmt = mysqli_prepare($connect, $check_query);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $error = 'Username atau Email sudah terdaftar!';
        } else {
            // Hash password agar aman
            $hashed_password = md5($password);


            // Insert ke tabel admin
            $insert_query = "INSERT INTO admin (username, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($connect, $insert_query);
            mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                // Redirect otomatis ke login.php setelah sukses
                header('Location: login.php?registered=success');
                exit;
            } else {
                $error = 'Terjadi kesalahan saat menyimpan data!';
            }
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Kecamatan Tinanggea</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Admin!</h1>
                            </div>

                            <?php if ($error): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>

                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        name="email" placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="repeat_password" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Sudah punya akun? Login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="../index.php">← Kembali ke Website</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
