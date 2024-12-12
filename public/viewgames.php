<?php

if (isset($_GET['platformiId'])) {
    require_once('dbconfig.php');
    $viewPlatforms = $pdo->prepare('SELECT * FROM platforms WHERE id=:id');
    $viewGames = $pdo->prepare('SELECT * FROM games WHERE platformId=:id');

    $value = [
        'id' => $_GET['platformiId']
    ];

    $viewPlatforms->execute($value);
    $viewGames->execute($value);

    $platform = $viewPlatforms->fetch();

    echo '<h1>' . $platform['name'] . ' game' . '</h1>';

    // echo '<ul>';
    foreach ($viewGames as $games) {
        echo '<p><a href="editGames.php?id= ' . $games['id'] . '">' . $games['name'] . '</a></p>';
        // echo '</ul>';
    }
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
</style>