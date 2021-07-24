<?php
session_start();

$_SESSION["userid"] = "empty";

session_destroy(true);
header("Location: login.php");
?>