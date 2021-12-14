<?php
session_start();

if ($_POST['user'] == 'admin' && $_POST['psw'] == 'admin') {
    $_SESSION['ingelogd'] = true;
    header('location: ../index.php?page=dashboard');
}
else if
    ($_POST['user'] == 'klant' && $_POST['psw'] == 'klant') {
    $_SESSION['ingelogd1'] = true;
    header('location: ../index.php?page=homepage');
}else{
    $_SESSION['melding'] = 'Combinatie gebruikersnaam en wacthwoord onjuist.';
    header('location: ../index.php?page=Login');
}

?>