<?php
$menuItems = [
    ['homepage', 'HOME'],
    ['Login', 'LOGIN'],
    ['register', 'REGISTER'],
    ['Overzicht', 'OVERZICHT'],
    ['Geleend', 'GELEEND'],
    ['Reserveerd', 'GERESERVEERD'],
];
?>

<div class="navigatie">
    <ul>
    <?php
    foreach ($menuItems as $menuItem) {
        echo '<li><a href="index.php?page=' . $menuItem[0] . '">' . $menuItem[1] . '</a></li>';
    }

    if (isset($_SESSION['ingelogd'])) {
        echo '<li><a href="index.php?page=OverzichtADMIN">ADMIN</a></li>';
        echo '<li><a href="index.php?page=boekentoevoegen">boekentoevoegen</a></li>';
        echo '<li><a href="index.php?page=boekenaanpassen">boekenaanpassen</a></li>';
        echo '<li><a href="php/logout.php">uitloggen</a></li>';
    }

    elseif (isset($_SESSION['ingelogd1'])) {
    echo '<li><a href="php/logout.php">uitloggen</a></li>';
    }
    ?>
    </ul>
</div>