<?php

include '../private/connection.php';

$Naam = $_POST['Naam'];
$Genre = $_POST['Genre'];
$ISBN = $_POST['ISBN'];
$schrijver = $_POST['schrijver'];
$Taal = $_POST['Taal'];
$paginas = $_POST['paginas'];
$exemplaren = $_POST['exemplaren'];


$stmt = $conn->prepare("INSERT INTO books (Naam, Genre,ISBN,schrijver,Taal,paginas,exemplaren) values(:Naam, :Genre, :ISBN, :schrijver, :Taak, :paginas,:exemplaren)");

$stmt->bindParam(':Naam', $Naam);
$stmt->bindParam(':Genre', $Genre);
$stmt->bindParam(':ISBN', $ISBN);
$stmt->bindParam(':schrijver', $schrijver);
$stmt->bindParam(':Taal', $Taal);
$stmt->bindParam(':paginas', $paginas);
$stmt->bindParam(':exemplaren', $exemplaren);


$stmt->execute();
header('location: ../index.php?page=OverzichtADMIN');