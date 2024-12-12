<?php
$server = 'mysql';
$username = 'student';
$password = 'student';
//The name of the schema we created earlier in MySQL workbench
//If this schema does not exist you will get an error!
$schema = 'csy2089';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);