<?php
session_start();

include '../private/connection.php';

$sql = 'SELECT password FROM users WHERE email = :email';
$sth = $conn->prepare($sql);
$sth->bindParam(':username', $_POST['user']);
$sth->execute();

if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {
if ($_POST['psw'] == $rsUser['password']) {
    $_SESSION['ingelogd'] = true;
    header('location: ../index.php?page=dashboard');

}else {
    $_SESSION['melding'] = 'Combinatie gebruikersnaam en wacthwoord onjuist.';
    header('location: ../index.php?page=Login');
   }
} else {
    $_SESSION['melding'] = 'Combinatie gebruikersnaam en wacthwoord onjuist.';
    header('location: ../index.php?page=Login');
}

?>