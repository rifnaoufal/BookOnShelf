<?php
session_start();

include '../private/connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = 'SELECT role,URID FROM users WHERE username= :username AND password = :password';

$query = $conn->prepare($sql);
$query->bindParam(':username', $username);
$query->bindParam(':password', $password);
$query->execute();


if ($query->rowCount() == 1 ) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result['role'] == "admin") {
        $_SESSION['ingelogd'] = true;
        $_SESSION['URID'] = $result['URID'];
        header('location: ../index.php?page=dashboard');
    } elseif ($result['role'] == "klant") {
        $_SESSION['ingelogd1'] = true;
        $_SESSION['URID'] = $result['URID'];
        header('location: ../index.php?page=welkom');
    }
}else{

    $_SESSION['melding'] = 'Combinatie gebruikersnaam en Wachtwoord onjuist.';
    header('location: ../index.php?page=login');
}
