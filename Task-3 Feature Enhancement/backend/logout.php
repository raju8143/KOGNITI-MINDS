<?php

session_start();


session_unset();
session_destroy();

header('Location: https://www.kognitiminds.com/login.php');
exit;
?>
