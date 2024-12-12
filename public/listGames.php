<ul>
    <li> <a href="addPlatform.php"> Add platform</a></li>
    <li><a href="addGames.php">Add game</a></li>
</ul>


<?php
require_once('dbconfig.php');

$displayPlatforms = $pdo->prepare('SELECT * FROM platforms ');

$displayPlatforms->execute();

echo '<h1>' . 'Select platform:' . '</h1>';
foreach ($displayPlatforms as $display) {
    echo '<li><a href="viewgames.php?platformiId=' . $display['id'] . '">' . $display['name'] . '</a></li>';
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