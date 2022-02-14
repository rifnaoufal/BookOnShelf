<?php
session_start();
include '../Private/connection.php';
if (isset($_POST['brengterug'])) {
    $bookid = $_POST['bookid'];
    $registratieid = $_SESSION['URID'];

    $stmt = $conn->prepare("DELETE FROM borrowed WHERE user_id = :usersid AND book_id = :Id ");
    $stmt->bindParam(':usersid', $registratieid);
    $stmt->bindParam(':Id', $bookid);
    $stmt->execute();


    $stmt = $conn->prepare("SELECT * FROM reserveren WHERE book_id = :Id ORDER BY user_id ASC LIMIT 1");
    $stmt->bindParam(':Id', $bookid);
    $stmt->execute();
    if ($stmt->rowCount() > 0){
        $result= $stmt->fetch();
        $stmt = $conn->prepare("DELETE FROM reserveren WHERE reserverenID = :reserveerid");
        $stmt->bindParam(':reserveerid', $result['reserverenID']);
        $stmt->execute();

        $stmt = $conn->prepare("INSERT INTO borrowed (book_id, user_id) VALUES (:Id, :usersid)");
        $stmt->bindParam(':Id', $bookid);
        $stmt->bindParam(':usersid', $result['user_id']);
        $stmt->execute();
    }else{
        $stmt = $conn->prepare("UPDATE books SET exemplaren = exemplaren + 1 where Id = :Id ");
        $stmt->bindParam(':Id', $bookid);
        $stmt->execute();
    }
    header('location: ../index.php?page=lenen');
}