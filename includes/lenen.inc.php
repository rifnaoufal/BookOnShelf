<?php
include '../Private/connection.php';
$registratieid = $_SESSION['role'];

$sql = "SELECT DISTINCT borrowed.book_id, borrowed.user_id, books.naam, books.Taal,  books.Genre, books.ISBN, books.Schrijver, books.Taal , books.paginas, books.Exemplaren
FROM borrowed
INNER JOIN books ON borrowed.book_id = books.Id
INNER JOIN users ON borrowed.user_id = users.role
WHERE borrowed.user_id = $registratieid";

$result = $conn->query($sql);
echo '<h2>Mijn geleende boeken</h2>';
echo'<table>';
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
                    <input type="hidden" name="bookid" value="<?= $row['BookID'] ?>">
                    <button type="submit" name="brengterug" class="btn-customer-borrow">terugbrengen</button>
                </form>
            </td>
        </tr>

        <?php
    }
} else {
    echo '<td> "0 results"</td>';
}?>
</table>