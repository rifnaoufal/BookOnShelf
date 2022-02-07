<?php
include 'private/connection.php';


$sql = "SELECT * FROM books";
$result = $conn->query($sql);

echo'<table style="color: aliceblue; margin-bottom: 28%">';
echo '<tr>';
echo "<th>Id</th>";
echo "<th>naam</th>";
echo "<th>Genre</th>";
echo "<th>schrijver</th>";
echo "<th>ISBN</th>";
echo "<th>Taal</th>";
echo "<th>paginas</th>";
echo "<th>exemplaren</th>";
echo '</tr>';

if ($result->rowCount() > 0){
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr">';
        echo '<td>'. $row["Id"];'</td>';
        echo '<td>'. $row["naam"];'</td>';
        echo '<td>'. $row["Genre"];'</td>';
        echo '<td>'. $row["ISBN"];'</td>';
        echo '<td>'. $row["schrijver"];'</td>';
        echo '<td>'. $row["Taal"];'</td>';
        echo '<td>'. $row["paginas"];'</td>';
        echo '<td>'. $row["exemplaren"];'</td>';
        echo '</tr>';
    }
} else {
    echo '<td> "0 results"</td>';
}
echo'</table>';
$dbh = null;
?>
<div class="container">
    <form action="../php/aanpassen.php" method="post">
        <input type="text" placeholder="Id" name="Id" required>
        <input type="text" placeholder="naam" name="naam" required>
        <input type="text" placeholder="Genre" name="Genre" required>
        <input type="text" placeholder="ISBN" name="ISBN" required>
        <input type="text" placeholder="schrijver" name="schrijver" required>
        <input type="text" placeholder="Taal" name="Taal" required>
        <input type="text" placeholder="paginas" name="paginas" required>
        <input type="text" placeholder="exemplaren" name="exemplaren" required>
        <button id="add-button" name="update" class="button">update</button>
    </form>
</div>
