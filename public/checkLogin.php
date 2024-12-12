<?php
session_start();
require_once('dbconfig.php');

// if (isset($_SESSION['loggedin'])) {
//     echo 'You are logged in. <a href="logout.php">Click here to log out</a>';

//     echo 'Welcome back!! ' . $_SESSION['name'];

//     if (!isset($_SESSION['counter'])) {
//         $_SESSION['counter'] = 0;
//     }
//     $_SESSION['counter']++;
//     echo $_SESSION['counter'];
//     if ($_SESSION['counter'] >= 10) {
//         unset($_SESSION['counter']);
//     }

// } else {
//     echo 'You are not logged in. <a href="logginPage.php">Click here to log in</a>';
// }

$stmt = $pdo->prepare('SELECT * FROM users WHERE id=:id');

$stmtValue = [
    'id' => $_SESSION['loggedin']
];

// var_dump($_SESSION);

$stmt->execute($stmtValue);
$newUser = $stmt->fetch();
echo 'Welcome back!! ' . $newUser['username'];

?>

<form action="logout.php">
    <input type="submit" name="logout" value="Logout">
</form>