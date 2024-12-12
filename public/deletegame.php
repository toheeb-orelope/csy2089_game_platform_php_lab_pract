<?php
if (isset($_POST['delete'])) {
    $updateGame = $pdo->prepare('
    DELETE FROM games
    WHERE id = :id');
    $value = [
        'id' => $_POST['id']
    ];

    $updateGame->execute($value);
    echo 'Game  ' . $_POST['name'] . '  deleted';
}