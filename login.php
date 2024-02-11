<?php
session_start();
$_SESSION['username'] = '';
if(isset($_SESSION['username'])) {
    header("Location: wallet.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Przykładowa walidacja (tymczasowa):
    if($username === '' && $password === '') {
        // Zapisz nazwę użytkownika w sesji
        $_SESSION['username'] = $username;
        header("Location: wallet.php");
        exit;
    } else {
        $error = "Nieprawidłowa nazwa użytkownika lub hasło";
    }
}
?>