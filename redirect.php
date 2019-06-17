<?php
include 'header.php';
$_SESSION["id_serie"] = $_GET["id"];

header('Location: view_serie.php');
?>