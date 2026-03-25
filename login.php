
<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>

    <link rel="stylesheet" href="css/login-style.css">
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
                Username atau password salah!
            </div>
        <?php endif; ?>        

        <form action="controller/proses_login.php" method="post">
            <input type="text" name="username" placeholder="Username" value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>" required>
            <input type="password" name="password" placeholder="Password" required>           
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="remember" name="remember"
                <?=  isset($_COOKIE['username']) ? 'chacked' : '' ?>
                >                
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            
            <br>
            <input type="submit" value="Login">
            
            <div class="text-center mt-3">
                <a href="index.php" class="text-dark">Kembali ke Berannda</a>
            </div>
        </form>
    </div>
</body>
</html>