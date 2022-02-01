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
            <h2>Naam</h2>
            <h4><?= $info['naam']  ?></h4>

            <h2>Genre</h2>
            <h4><?= $info['Genre']  ?></h4>

            <h2>ISBN</h2>
            <h4><?= $info['ISBN']  ?></h4>

            <h2>Schrijver</h2>
            <h4><?= $info['schrijver']  ?></h4>

            <h2>Taal</h2>
            <h4><?= $info['Taal']  ?></h4>

            <h2>paginas</h2>
            <h4><?= $info['paginas']  ?></h4>

            <h2>exemplaren</h2>
            <h4><?= $info['exemplaren']  ?></h4>
            
            <button>Reserveren</button>
            <button>terug brengen</button>
            <form method="POST" action="php/terugbrengen.php">
                <input type="hidden" name="bookid" value="<?= $row['book_id'] ?>">
                <button type="submit" name="brengterug" class="btn-customer-borrow">Breng terug</button>
            </form>
        </div>
        <?php
    }
    ?>
</div>