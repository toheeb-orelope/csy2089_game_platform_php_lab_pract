<?php
session_start();



echo 'Welcome back!! ' . $_SESSION['name'];

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}
$_SESSION['counter']++;
echo $_SESSION['counter'];
if ($_SESSION['counter'] >= 10) {
    unset($_SESSION['counter']);
}
?>