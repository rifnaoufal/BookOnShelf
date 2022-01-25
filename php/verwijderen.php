<?php
include '../private/connection.php';


$Id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM books WHERE Id = :Id");
$stmt->bindParam(':Id', $Id, PDO::PARAM_STR);
$stmt->execute();

header('location: ../index.php?page=OverzichtADMIN');
