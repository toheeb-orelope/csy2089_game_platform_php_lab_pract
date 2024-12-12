<?php
session_start();

if (isset($_POST['submit'])) {
    $_SESSION['name'] = $_POST['name'];
    echo '<p><a href="welcome.php" >' . 'Go to welcome page.' . '</a></p>';
}

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}
$_SESSION['counter']++;
echo $_SESSION['counter'];

?>


<form action="name.php" method="POST">
    <label for="">What is your name</label>
    <input type="text" name="name" id="">

    <input type="submit" name="submit" value="Submit">
</form>