<div class="loginform">
    <h1>Login</h1>
    <?php
    if (isset($_SESSION['melding]'])) {
        echo '<p>' . $_SESSION['melding'] . '<p>';
        unset($_SESSION['melding']);
    }
    ?>

    <form action="php/login.php" method="post">
        <p>username of Email</p>
        <input type="text" name="username" placeholder="username" required/>
        <p>wachtwoord</p>
        <input type="text" name="password" placeholder="wachtwoord" required/>
        <button type="submit">Login</button>
    </form>
</div>