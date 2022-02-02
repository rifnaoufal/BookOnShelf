<?php
include 'Private/connection.php';
$regid = $_SESSION['URID'];

$sql = "SELECT reserveren.book_id, reserveren.user_id, reserveren.reserverenID, books.Id, books.naam,  books.Genre, books.ISBN, books.schrijver, books.Taal , books.paginas, books.exemplaren, books.foto
FROM reserveren
INNER JOIN books ON reserveren.book_id = books.Id
INNER JOIN users ON reserveren.user_id = users.URID
WHERE reserveren.user_id = $regid";

$result = $conn->query($sql);
echo '<h2 style="color: white">Gereserveerde boeken</h2>';
echo '<table style="color: white">';
echo '<tr>';

echo "<th>naam</th>";
echo "<th>Genre</th>";
echo "<th>ISBN</th>";
echo "<th>schrijver</th>";
echo "<th>Taal</th>";
echo "<th>paginas</th>";
echo "<th>exemplaren</th>";

echo '</tr>';

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row["naam"] ?></td>
            <td><?= $row["Genre"] ?></td>
            <td><?= $row["ISBN"] ?></td>
            <td><?= $row["schrijver"] ?></td>
            <td><?= $row["Taal"] ?></td>
            <td><?= $row["paginas"] ?></td>
            <td><?= $row["exemplaren"] ?></td>
            <td>
                <form method="POST" action="../php/reserveringann.php">
                    <input type="hidden" name="bookid" value="<?= $row['Id'] ?>">
                    <button type="submit" name="brengterug" class="btn-customer-borrow">cancel reservering</button>
                </form>
            </td>
        </tr>
        <?php
    }
} else {
    echo '<td> "Geen Resultaten."</td>';
} ?>