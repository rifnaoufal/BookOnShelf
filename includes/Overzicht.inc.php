<link rel="stylesheet" href="stylesheet.css">
<div class="container w3-row-padding w3-padding-16 w3-center">
    <?php
    include 'private/connection.php';
    $sql = "SELECT Id, naam, Genre, ISBN, schrijver, Taal, paginas, exemplaren, foto FROM books";
    $sth = $conn->prepare($sql);
    $sth->execute();
    while ($info = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="w3-quarter">
            <img src="<?=$info['foto'] ?>"style="width:40%">
            <h3><?= $info['naam']  ?></h3>
            <h3><?= $info['Genre']  ?></h3>
            <h3><?= $info['ISBN']  ?></h3>
            <h3><?= $info['schrijver']  ?></h3>
            <h3><?= $info['Taal']  ?></h3>
            <h3><?= $info['paginas']  ?></h3>
            <h3><?= $info['exemplaren']  ?></h3>
        </div>
        <?php
    }
    ?>
</div>