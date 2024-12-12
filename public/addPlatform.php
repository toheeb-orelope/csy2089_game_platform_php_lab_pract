<?php
require_once('dbconfig.php');

if (isset($_POST['submit'])) {
    $platformRec = $pdo->prepare('INSERT INTO platforms(name) VALUES (:name)');

    $value = [
        'name' => $_POST['platformname']

    ];

    $platformRec->execute($value);
    echo 'Platform   ' . $_POST['platformname'] . '  added';
} else {



    ?>

    <form action="addPlatform.php" method="POST">

        <label for="">Add platform</label>
        <input type="text" name="platformname" id="">

        <input type="submit" name="submit" value="Add Platform">
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