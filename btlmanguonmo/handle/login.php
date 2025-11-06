<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header('Location: ../views/main.php');
        exit;
    } else {
        $_SESSION['login_error'] = "Tên đăng nhập hoặc mật khẩu không đúng";
        header('Location: ../index.php');
        exit;
    }
}
?>