<?php
session_start();
include '../Private/connection.php';
if(isset($_POST['Leen'])){
    $bookid = $_POST['bookid'];
    $userid = $_SESSION['URID'];

    echo $bookid . $userid;

    $stmt = $conn->prepare("INSERT INTO borrowed (user_id, book_id)
                    VALUES(:usersid, :booksid)");

    $stmt->bindParam(':usersid' , $userid);
    $stmt->bindParam(':booksid' , $bookid);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE books SET exemplaren = exemplaren - 1 where Id = :bookid ");
    $stmt->bindParam(':bookid' , $bookid);
    $stmt->execute();
    header('location: ../index.php?page=lenen');
    }
    else{
        header('location: ../index.php?page=Overzicht');
}