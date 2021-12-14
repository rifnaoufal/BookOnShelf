<?php
$menuItems = [
    ['homepage', 'Home'],
    ['Login', 'login'],
    ['register', 'Register'],
    ['Overzicht', 'Overzicht'],
    ['OverzichtADMIN', '[ADMIN]'],
    ['Geleend', 'Geleend'],
    ['Reserveerd', 'Reserveerd'],
];
?>

<div class="navigatie">
    <?php
    foreach ($menuItems as $menuItem) {
        echo '<li><a href="index.php?page=' . $menuItem[0] . '">' . $menuItem[1] . '</a></li>';
    }

    if (isset($_SESSION['ingelogd'])) {
        echo '<li><a href="php/logout.php">uitloggen</a></li>';
    }
    ?>
</div>