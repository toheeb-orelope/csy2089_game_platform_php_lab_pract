<?php
require_once('dbconfig.php');

if (isset($_POST['submit'])) {
    $updateGame = $pdo->prepare('
                        UPDATE games SET
                        name = :name,
                        platformiId = :platformiId
                        WHERE id = :id');
    $value = [
        'name' => $_POST['name'],
        'platformiId' => $_POST['platformiId'],
        'id' => $_POST['id']
    ];

    $updateGame->execute($value);
    echo 'Game  ' . $_POST['name'] . '  edited';
} else if (isset($_GET['id'])) {

    $gameSTMT = $pdo->prepare('SELECT * FROM games WHERE id=:id');

    $value = [
        'id' => $_GET['id']
    ];

    $gameSTMT->execute($value);
    $games = $gameSTMT->fetch();


    ?>
        <form action="editGames.php" method="POST">
            <input type="hidden" name="id" value=" <?php echo $games['id']; ?>">

            <label for="">Game name:</label>
            <input type="text" name="name" value="<?php echo $games['name']; ?>">
            <label for="">Select platform</label>
            <select name="platformiId" id="">
                <?php
                $platformSTMT = $pdo->prepare('SELECT * FROM platforms');
                $platformSTMT->execute();

                foreach ($platformSTMT as $platforms) {
                    if ($platforms['id'] == $games['platformiId']) {
                        echo '<option value="' . $platforms['id'] . '" selected="selected">' . $platforms['name'] . '</option>';
                    } else {
                        echo '<option value="' . $platforms['id'] . '">' . $platforms['name'] . '</option>';
                    }
                }
                ?>
            </select>

            <input type="submit" name="submit" value="Add">
            <input type="submit" name="delete" value="Delete">


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

    a {
        text-decoration: none;
    }

    body {
        margin-left: 3em;
        margin-top: 3em;
    }

    li {
        list-style: none;
    }
</style>