<?php
session_start();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'Homepage';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookOnShelf</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<header>
    <div class="banner">
        <?php include 'includes/navbar.inc.php'; ?>

        <?php include 'includes/' . $page . '.inc.php'; ?>
    </div>
</header>
</body>
</html>