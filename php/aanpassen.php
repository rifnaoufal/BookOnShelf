<?php
include '../private/connection.php';



if (isset($_POST['update']));
{
    $BoekNaam = $_POST['Naam'];
    $Genre = $_POST['Genre'];
    $ISBN = $_POST['ISBN'];
    $Auteur = $_POST['schrijver'];
    $Taal = $_POST['Taal'];
    $Pages = $_POST['paginas'];
    $Exemplaren = $_POST['exemplaren'];
    $BookID = $_POST['BookID'];

    $stmt = $conn->prepare("UPDATE books SET `Naam` = :Naam, `Genre` = :Genre, `ISBN` = :ISBN, `schrijver` = :schrijver, `Taal` = :Taal, `paginas` = :paginas, `exemplaren` = :exemplaren  WHERE `ID` = :ID");
    $stmt->bindParam(':Naam', $Naam, PDO::PARAM_STR);
    $stmt->bindParam(':Genre', $Genre, PDO::PARAM_STR);
    $stmt->bindParam(':ISBN', $ISBN, PDO::PARAM_STR);
    $stmt->bindParam(':schrijver', $schrijver, PDO::PARAM_STR);
    $stmt->bindParam(':Taal', $Taal, PDO::PARAM_STR);
    $stmt->bindParam(':paginas', $Paginas, PDO::PARAM_STR);
    $stmt->bindParam(':exemplaren', $exemplaren, PDO::PARAM_STR);
    $stmt->bindParam(':BookID', $ID, PDO::PARAM_INT);
    $stmt->execute();
}

header('location: ../index.php?page=OverzichtADMIN');
