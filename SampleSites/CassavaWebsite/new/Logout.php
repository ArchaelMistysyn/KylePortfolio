<?php
session_start();

header("Location: MyLogin.php");
session_destroy();

?>