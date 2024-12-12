<?php
session_start();
if (isset($_POST['submit'])) {
    //Check they entered the correct username/password
    if ($_POST['username'] === 'csy2028' && $_POST['password'] === 'secret') {
        $_SESSION['loggedin'] = true;
        echo 'You are now logged in, <a href="checkLogin.php">Go to checkLogin.php</a>';
    }
    //If they didn't, display an error message
    else {
        echo '<p>You did not enter the correct username and password</p>';
    }
} else { //The submit button was not pressed, show the log-in form
    ?>
    <form action="logginPage.php" method="POST">
        <label>Username: </label>
        <input type="text" name="username" />
        <label>Password: </label>
        <input type="password" name="password" />
        <input type="submit" name="submit" value="Log In" />
    </form>
    <?php
}