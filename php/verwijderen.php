<?php
include '../private/connection.php';


$BookID = $_POST['BookID'];


$stmt = $conn->prepare("DELETE FROM books WHERE ID = :ID");
$stmt->bindParam(':BookID', $BookID, PDO::PARAM_STR);
$stmt->execute();

header('location: ../index.php?page=OverzichtADMIN');
