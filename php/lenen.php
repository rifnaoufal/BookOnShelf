<?php
session_start();
include '../Private/connection.php';
if(isset($_POST['Leen'])){
    $bookid = $_POST['book_id'];
    $userid = $_SESSION['Role'];

     $sql = "SELECT * FROM borrowed ";
    $result = $conn->query($sql);
     if($result->rowCount() > 0  )

    $sql='SELECT * FROM borrowed';
    $result = $conn->query($sql);

    if ($result->rowCount() == 0){
        $stmt = $conn->prepare("INSERT INTO borrowed (user_id, book_id)
                        VALUES(:usersid, :booksid)");

        $stmt->bindParam(':usersid' , $userid);
        $stmt->bindParam(':booksid' , $bookid);
        $stmt->execute();

        $stmt = $conn->prepare("UPDATE books SET exemplaren = exemplaren - 1 where Id = :bookid ");
        $stmt->bindParam(':bookid' , $bookid);
        $stmt->execute();
        header('location: ../index.php?page=Geleend');
    }
    else{
        header('location: ../index.php?page=Overzicht');

    }
}