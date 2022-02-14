<?php
session_start();
include '../Private/connection.php';

$bookid = $_POST['bookid'];
$userid = $_SESSION['URID'];

$sql='SELECT * FROM reserveren where book_id = :Id and user_id = :userid';
$result = $conn->prepare($sql);
$result->bindParam(':userid' , $userid);
$result->bindParam(':Id' , $bookid);
$result->execute();

if ($result->rowCount() == 0) {
    $stmt = $conn->prepare("INSERT INTO reserveren (user_id, book_id)
                        VALUES(:usersid, :Id)");
    $stmt->bindParam(':usersid', $userid);
    $stmt->bindParam(':Id', $bookid);

    $stmt->execute();

    header('location: ../index.php?page=gereserveerd');
}