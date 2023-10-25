<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-wrapper">
    <?php
    // Mendapatkan nilai error dan pesan dari parameter URL
    $error = isset($_GET['error']) ? $_GET['error'] : '';
    $pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';

    // Menampilkan notifikasi jika error=1
    if ($error == '1') {
        echo '<script>alert("' . $pesan . '")</script>';
    }
    ?>

    <div class="container-sm mt-5 p-5 " style="width: 500px; background-color: #eeeeee;">
        <form class="form-signin" action="login_action.php" method="post">
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal">Log In to Aplikasi Pembayaran Listrik Pascabayar</h1>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </div>
            <div class="text-center">
                <p><a href="admin/login_admin.php">Masuk sebagai Admin</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
