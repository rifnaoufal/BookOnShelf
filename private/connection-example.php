<?php

$servername = "localhost";
$username = "root";
$password = "naoufal";

try {
    $conn = new PDO("mysql:host=$servername;dbname=bookonshelf", $username, $password);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>