<?php
session_start();

$valid_username = "admin";
$valid_password = "12345";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {

        // simpan session
        $_SESSION['username'] = $username;

        if (isset($_POST['remember'])) {
            // menyimpan cookie selama 7 hari
            setcookie("username", $username, time() + (60 * 60 * 24 * 7), "/");
        } else {
            // menghapus cookie kalau tidak dicentang
            setcookie("username", "", time() - 3600, "/");
        }

        header("Location: ../index.php");
        exit();

    } else {
        header("Location: ../login.php?error=1");
        exit();
    }
}
?>