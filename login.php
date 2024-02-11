<?php
session_start();

// Sprawdź, czy użytkownik jest już zalogowany, jeśli tak, przekieruj go do strony głównej
if(isset($_SESSION['username'])) {
    header("Location: wallet.php");
    exit;
}

// Sprawdź, czy formularz logowania został wysłany
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane logowania z formularza
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tutaj można dodać walidację danych logowania, np. sprawdzenie w bazie danych

    // Przykładowa walidacja (tymczasowa):
    if($username === '' && $password === '') {
        // Zapisz nazwę użytkownika w sesji
        $_SESSION['username'] = $username;
        
        // Przekieruj użytkownika do strony głównej po udanym zalogowaniu
        header("Location: wallet.php");
        exit;
    } else {
        $error = "Nieprawidłowa nazwa użytkownika lub hasło";
    }
}
?>