<?php
//logout script

session_start();
$_SESSION = array();
session_destroy();

header('Location: index.php');
?>