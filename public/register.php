<?php
require_once('dbconfig.php');

/*
Testing passwords
nameone@myemail.com pass: @Greatest4Ever (Grad C)

keeptrying@outlook.com   @Greatest4Ever (Grad B)

believey06@hotmail.com @Greatest4Ever (Grade A)

molockoalvina@outlook.com @newgreateness (Grade A)
*/

if (isset($_POST['submit'])) {

    //Grade D, C, and B
    // $register = $pdo->prepare('INSERT INTO users(username, password) VALUES (:username, :password)');

    //Grade A
    $register = $pdo->prepare('
                            INSERT INTO users
                            (username, password) 
                            VALUES (:username, :password)');

    //Grade A: Passwords are hashed using PHP’s password_hash() function
    $myPassword = $_POST['password'];
    $hashPassword = password_hash($myPassword, PASSWORD_DEFAULT);

    $value = [
        'username' => $_POST['username'],

        //  Grade D: Passwords are stored in plain text in the database
        // 'password' => sha1($_POST['password'])

        //Grade C Grade C: Passwords are hashed using sha1, md5, sha256 or similar
        // 'password' => sha1($_POST['password'])

        //Grade B: Passwords are hashed using a one way hash (sha1, md5, etc) but are also salted
        // 'password' => sha1($_POST['username'] . $_POST['password'])

        //Grade A password hash called
        'password' => $hashPassword

    ];

    $register->execute($value);
    echo 'Accound created!!! ' . '<a href="login.php">' . 'click here to login' . '</a>';

} else {
    ?>
    <form action="register.php" method="POST">
        <label for="">Create a username</label>
        <input type="text" name="username" id="">

        <label for="">Create a password</label>
        <input type="password" name="password" id="">

        <input type="submit" name="submit" value="Register">
    </form>



    <?php
}
?>