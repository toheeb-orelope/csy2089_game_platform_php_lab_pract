<?php
session_start();
unset($_SESSION['loggedin']);
echo 'You are now logged out
<a href="login.php">Go to login page</a>';