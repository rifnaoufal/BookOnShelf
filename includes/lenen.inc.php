<?php
include 'Private/connection.php';
$regid = $_SESSION['URID'];

$sql = "SELECT DISTINCT borrowed.book_id, borrowed.user_id, books.Id, books.naam, books.Taal,  books.Genre, books.ISBN, books.schrijver, books.paginas, books.exemplaren
FROM borrowed
INNER JOIN books ON borrowed.book_id = books.Id
INNER JOIN users ON borrowed.user_id = users.URID
WHERE borrowed.user_id = $regid";

$result = $conn->query($sql);
echo '<h2 style="color: white">Mijn geleende boeken</h2>';
echo'<table style="color: white">';
echo '<tr>';

echo "<th>naam</th>";
echo "<th>Genre</th>";
echo "<th>schrijver</th>";
echo "<th>Taal</th>";
echo "<th>ISBN</th>";
echo "<th>exemplaren</th>";
echo "<th>paginas</th>";
echo' <th>Breng terug</th>';

echo '</tr>';

if ($result->rowCount() > 0){
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row["naam"] ?></td>
            <td><?= $row["Genre"] ?></td>
            <td><?= $row["schrijver"] ?></td>
            <td><?= $row["Taal"] ?></td>
            <td><?= $row["ISBN"] ?></td>
            <td><?= $row["exemplaren"] ?></td>
            <td><?= $row["paginas"] ?></td>
            <td>
                <form method="POST" action="../php/terugbrengen.php">
                    <input type="hidden" name="bookid" value="<?= $row['Id'] ?>">
                    <button type="submit" name="brengterug" class="btn-customer-borrow">terugbrengen</button>
                </form>
            </td>
        </tr>

        <?php
    }
} else {
    echo '<td> "Geen Resultaten."</td>';
}?>
</table>