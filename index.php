<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Strona logowania</title>
</head>
<body>
<div class="form-box">
  
    <form action="login.php" method="post">
        <input type="text" name="$username" placeholder="Login">
        <input type="password" name="$password" placeholder="Hasło">
        <button type="submit" class="action-button">Zaloguj</button>
    </form>
    <button onclick="window.location.href='registration.php'" class="action-button">Zarejestruj</button>
</div>
</body>
</html>