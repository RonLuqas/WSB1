<?php
session_start();

$data = array(
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
);

// walidacja
if ($_POST['password'] !== $_POST['confirm_password']) {
    $_SESSION['error_message'] = 'Hasła nie są zgodne.';
    header('Location: registration.php');
    exit;
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
$response = curl_exec($ch);

curl_close($ch);


$responseData = json_decode($response, true);
echo $responseData;

?>