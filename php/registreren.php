<?php
include '../private/connection.php';

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$woonplaats = $_POST['woonplaats'];
$straat = $_POST['straat'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$username = $_POST['username'];
$password = $_POST['password'];
$geboortedatum = $_POST['geboortedatum'];


$stmt = $conn->prepare("INSERT INTO users (voornaam, achternaam,woonplaats,straat,huisnummer,postcode,username,password,geboortedatum) values(:voornaam, :achternaam, :woonplaats, :straat, :huisnummer,:postcode,:username,:password,:geboortedatum)");

$stmt->bindParam(':voornaam' , $voornaam);
$stmt->bindParam(':achternaam' , $achternaam);
$stmt->bindParam(':woonplaats' , $woonplaats);
$stmt->bindParam(':straat' , $straat);
$stmt->bindParam(':huisnummer' , $huisnummer);
$stmt->bindParam(':postcode' , $postcode);
$stmt->bindParam(':username' , $username);
$stmt->bindParam(':password' , $password);
$stmt->bindParam(':geboortedatum' , $geboortedatum);


$stmt->execute();
header('location: ../index.php?page=Login');

?>