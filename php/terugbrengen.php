<?php
session_start();
include '../Private/connection.php';
if (isset($_POST['brengterug'])) {
    $bookid = $_POST['bookid'];
    $registratieid = $_SESSION['URID'];


    $stmt = $conn->prepare("DELETE FROM borrowed where user_id = :usersid AND book_id = :bookid ");
    $stmt->bindParam(':usersid', $registratieid);
    $stmt->bindParam(':bookid', $bookid);
    $stmt->execute();

    $stmt = $conn->prepare("SELECT * FROM reserveren WHERE user_id = :bookid ORDER BY user_id ASC LIMIT 1");
    $stmt->bindParam(':bookid', $bookid);
    $stmt->execute();
    if ($stmt->rowCount() > 0){
        $result= $stmt->fetch();
        $stmt = $conn->prepare("DELETE FROM reserveren WHERE reserverenID = :reserveerid");
        $stmt->bindParam(':reserveerid', $result['reserveerid']);
        $stmt->execute();

        $stmt = $conn->prepare("INSERT INTO borrowed (book_id, user_id) VALUES (:bookid, :usersid)");
        $stmt->bindParam(':bookid', $bookid);
        $stmt->bindParam(':usersid', $result['usersid']);
        $stmt->execute();

    }else{
        $stmt = $conn->prepare("UPDATE books SET exemplaren = exemplaren + 1 where Id = :bookid ");
        $stmt->bindParam(':bookid', $bookid);
        $stmt->execute();
    }


    header('location: ../index.php?page=lenen');
}
