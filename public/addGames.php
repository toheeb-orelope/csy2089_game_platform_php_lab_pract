<?php
require_once('dbconfig.php');

if (isset($_POST['submit'])) {
    $myGames = $pdo->prepare('INSERT INTO games(name, platformId) VALUES(:name, :platformId)');
    $value = [
        'name' => $_POST['gameName'],
        'platformId' => $_POST['id']
    ];

    $myGames->execute($value);
    echo 'Game  ' . $_POST['gameName'] . '  added';

} else {

    //Fetch platformId
// $platformId = $pdo->prepare('SELECT * FROM platforms');


    ?>


    <form action="addGames.php" method="POST">

        <label for="">Add games</label>
        <input type="text" name="gameName" id="">


        <select name="id" id="">
            <?php
            $platformId = $pdo->prepare('SELECT * FROM platforms');
            $platformId->execute();

            foreach ($platformId as $platform) {
                echo '<option value="' . $platform['id'] . '">' . $platform['name'] . '</option>';
            }
            ?>
        </select>

        <input type="submit" name="submit" value="Add Game">
    </form>
    <?php
}
?>

<style>
    form {
        display: block;
    }

    form label,
    form input,
    textarea {
        width: 200px;
        float: left;
        margin-bottom: 20px;
    }

    input[type=submit] {
        clear: both;
        margin-left: 3em;
    }

    form label {
        clear: left;
    }
</style>