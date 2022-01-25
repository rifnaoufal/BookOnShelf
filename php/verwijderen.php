<?php
include '../private/connection.php';


$ID = $_POST['ID'];


$stmt = $conn->prepare("DELETE FROM books WHERE ID = :ID");
$stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
$stmt->execute();

header('location: ../index.php?page=OverzichtADMIN');
