<?php
session_start();
include '../Private/connection.php';
if (isset($_POST['brengterug'])) {
    $bookid = $_POST['book_id'];
    $userid = $_SESSION['URID'];

    $stmt = $conn->prepare("DELETE FROM borrowed where user_id = :usersid AND book_id = :booksid ");
    $stmt->bindParam(':usersid', $userid);
    $stmt->bindParam(':booksid', $bookid);
    $stmt->execute();


    $stmt = $conn->prepare("UPDATE books SET exemplaren = exemplaren + 1 where book_id = :bookid ");
    $stmt->bindParam(':bookid', $bookid);
    $stmt->execute();


    header('location: ../index.php?page=lenen');
}