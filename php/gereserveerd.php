<?php
session_start();
include '../Private/connection.php';

$bookid = $_POST['bookid'];
$userid = $_SESSION['URID'];

$sql='SELECT * FROM reserveren where book_id = :bookid and user_id = :userid';
$result = $conn->prepare($sql);
$result->bindParam(':userid' , $userid);
$result->bindParam(':bookid' , $bookid);
$result->execute();

if ($result->rowCount() == 0) {
    $stmt = $conn->prepare("INSERT INTO reserveren (user_id, book_id)
                        VALUES(:usersid, :booksid)");

    $stmt->bindParam(':usersid', $userid);
    $stmt->bindParam(':booksid', $bookid);

    $stmt->execute();

    header('location: ../index.php?page=gereserveerd');
}