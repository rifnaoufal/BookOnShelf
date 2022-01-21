<?php
include '../private/connection-example.php';

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$woonplaats = $_POST['woonplaats'];
$straat = $_POST['straat'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$username = $_POST['username'];
$password = $_POST['password'];


$stmt = $conn->prepare("INSERT INTO users (voornaam, achternaam,woonplaats,straat,huisnummer,postcode,username,password) values(:voornaam, :achternaam, :woonplaats, :straat, :huisnummer,:postcode,:username,:password)");

$stmt->bindParam(':voornaam' , $voornaam);
$stmt->bindParam(':achternaam' , $achternaam);
$stmt->bindParam(':woonplaats' , $woonplaats);
$stmt->bindParam(':straat' , $straat);
$stmt->bindParam(':huisnummer' , $huisnummer);
$stmt->bindParam(':postcode' , $postcode);
$stmt->bindParam(':username' , $username);
$stmt->bindParam(':password' , $password);


$stmt->execute();
header('location: ../index.php?page=Login');