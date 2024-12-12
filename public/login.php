<?php
session_start();
require_once('dbconfig.php');


if (isset($_POST['submit'])) {


    //Grade D, C, and B
    // $checkUser = $pdo->prepare('
    //                 SELECT * FROM users WHERE 
    //                 username = :username AND 
    //                 password = :password');


    //Grade A
    $checkUser = $pdo->prepare('
    SELECT * FROM users WHERE 
    username = :username');

    $value = [
        'username' => $_POST['username'],

        //  Grade D: Passwords are stored in plain text in the database
        // 'password' => sha1($_POST['password'])

        //Grade C Grade C: Passwords are hashed using sha1, md5, sha256 or similar
        // 'password' => sha1($_POST['password'])


        //Grade B: Passwords are hashed using a one way hash (sha1, md5, etc) but are also salted
        // 'password' => sha1($_POST['username'] . $_POST['password'])
    ];

    $checkUser->execute($value);

    //For Grade D, C, and B
    // if ($checkUser->rowCount() > 0) {

    $user = $checkUser->fetch();
    //For Grade A
    if (password_verify($_POST['password'], $user['password'])) {


        $_SESSION['loggedin'] = $user['id'];

        echo 'You are logged in ' . '<a href="logout.php">' . 'click here to logout' . '</a>';

    } else {
        // echo 'Sorry, your username and password cound not be found';
        echo 'Username and password do not match.😒😒😒' . '<a href="login.php">' . 'Please try again' . '</a>';
    }
} else {

    ?>

    <form action="login.php" method="POST">

        <label>Username: </label>
        <input type="text" name="username" />

        <label>Password: </label>
        <input type="password" name="password" />

        <input type="submit" name="submit" value="Log In" />
    </form>

    <?php
}
?>