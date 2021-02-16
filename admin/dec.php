<?php
session_start();
$_SESSION["login"]="";
// session_unset($_SESSION["login"]);
header("location:index.php");