<?php
include '../private/connection-example.php';



if (isset($_POST['update']));
{
    $naam = $_POST['naam'];
    $Genre = $_POST['Genre'];
    $ISBN = $_POST['ISBN'];
    $schrijver = $_POST['schrijver'];
    $Taal = $_POST['Taal'];
    $paginas = $_POST['paginas'];
    $exemplaren = $_POST['exemplaren'];

    $stmt = $conn->prepare("UPDATE books SET `Naam` = :Naam, `Genre` = :Genre, `ISBN` = :ISBN, `schrijver` = :schrijver, `Taal` = :Taal, `paginas` = :paginas, `exemplaren` = :exemplaren  WHERE `ID` = :ID");
    $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
    $stmt->bindParam(':Genre', $Genre, PDO::PARAM_STR);
    $stmt->bindParam(':ISBN', $ISBN, PDO::PARAM_STR);
    $stmt->bindParam(':schrijver', $schrijver, PDO::PARAM_STR);
    $stmt->bindParam(':Taal', $Taal, PDO::PARAM_STR);
    $stmt->bindParam(':paginas', $paginas, PDO::PARAM_STR);
    $stmt->bindParam(':exemplaren', $exemplaren, PDO::PARAM_STR);
    $stmt->execute();
}

header('location: ../index.php?page=OverzichtADMIN');
php
